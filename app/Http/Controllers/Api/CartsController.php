<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Shiping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function allcarts()
	{
		$carts = \Cart::getContent();
		$cart_count = $carts->count();
		$cart_total = \Cart::getTotal();
		$cart_sub_total = \Cart::getSubTotal();
		return response()->json([
			'carts'=>$carts,
			'cart_count'=>$cart_count,
			'cart_total'=>$cart_total,
			'cart_sub_total'=>$cart_sub_total,
		]);
	}

	public function addtocart(Request $request)
	{
		$product = Product::find($request->id);
		if ($product->discount > 0) {
			$price = $product->unit_price - ($product->unit_price / 100 * $product->discount);
		}else{
			$price = $product->unit_price;
		}
		\Cart::add(array(
		    'id' => $product->id,
		    'name' => $product->name,
		    'image' => $product->thumbnail_img,
		    'price' => number_format($price),
		    'quantity' => 1,
		    'attributes' => array(
		    	'image' => $product->thumbnail_img,
		    )
		));
	}

	public function removetocart(Request $request)
	{
		\Cart::remove($request->id);
		return response()->json($request->id);
	}

	public function addtocartqty(Request $request)
	{
		$this->validate($request,[
            'quantity' => 'required|min:1',
        ]);

		$product = Product::find($request->product_id);
		if ($product->discount > 0) {
			$price = $product->unit_price - ($product->unit_price / 100 * $product->discount);
		}else{
			$price = $product->unit_price;
		}
		\Cart::add(array(
		    'id' => $product->id,
		    'name' => $product->name,
		    'image' => $product->thumbnail_img,
		    'price' => number_format($price),
		    'quantity' => $request->quantity,
		    'attributes' => array(
		    	'image' => $product->thumbnail_img,
		    )
		));
	}

	public function cartminus(Request $request)
	{
		\Cart::update($request->id, array(
		  'quantity' => -1,
		));
		return response()->json('okay');
	}

	public function cartplus(Request $request)
	{
		\Cart::update($request->id, array(
		  'quantity' => +1,
		));
		return response()->json('okay');
	}

	public function order(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'number' => 'required',
            'payment' => 'required',
        ]);

		$order = New Order;
		if(auth()->user())
			$user_id = auth()->user()->id;
		else{
			$user_id = 1;
		}
		$order->user_id = $user_id;
		$order->orders_code = date('Ymd-his');
		$order->shiping_status = 'pending';
		$order->payment_status = 'Unpaid';
		$order->payment_method = $request->payment;
		$order->price = \Cart::getTotal();
		$order->view = 0;
		$order->save();

		foreach (\Cart::getContent() as $cart) {
			$product = Product::find($cart->id);
			$order_detail = New OrderDetails;
			$order_detail->order_id = $order->id;
			$order_detail->product_id = $product->id;
			$order_detail->quantity = $cart->quantity;
			$order_detail->price = $cart->price;
			$order_detail->save();
		}

		$shiping = New Shiping;
		$shiping->order_id = $order->id;
		$shiping->name = $request->name;
		$shiping->email = $request->email;
		$shiping->address = $request->address;
		$shiping->city = $request->city;
		$shiping->number = $request->number;
		$shiping->save();
		\Cart::clear();
		return response()->json($order);

	}

	public function user_order()
	{
		$orders = Order::where('user_id',1)->latest()->get();
		return response()->json($orders);
	}

	public function user_order_view($id)
	{
		$order = Order::find($id);
		$order_shiping = Shiping::where('order_id',$id)->first();
		$order_details = OrderDetails::with('product')->where('order_id',$id)->get();

		return response()->json([
			'order'=>$order,
			'order_shiping'=>$order_shiping,
			'order_details'=>$order_details,
		]);
	}

}
