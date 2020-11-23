<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sliders()
    {
    	$sliders = Slider::latest()->get();
    	return response()->json($sliders);
    }
    public function categoryes()
    {
    	$categoryes = Category::take(6)->get();
    	return response()->json($categoryes);
    }
    public function products()
    {
        $products = Product::latest()->take(12)->get();
        return response()->json($products);
    }
    public function product($id)
    {
        $product = Product::with('category')->where('id',$id)->first();

        return response()->json($product);
    }


    public function cart_show()
    {
        return Cart::getContent();
    }

    public function category_products($id)
    {
        $products = Product::where('category_id',$id)->get();
        $category = Category::find($id);
        return response()->json([
            'products'=> $products,
            'category'=> $category,
        ]);
    }

}
