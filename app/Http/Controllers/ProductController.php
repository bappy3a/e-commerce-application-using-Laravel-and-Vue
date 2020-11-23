<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('backend.product.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = New Product;
        $product->name = $request->name;
        $product->user_id = 1;
        $product->category_id = $request->category_id;
        $product->thumbnail_img = $request->thumbnail_img->store('uploads/products/thumbnail');
        $photos = array();
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos');
                array_push($photos, $path);
            }
            $product->photos = json_encode($photos);
        }
        $product->unit_price = $request->unit_price;
        $product->published = 1;
        $product->featured = 0;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->current_stock = $request->current_stock;
        $product->shipping_cost = $request->shipping_cost;
        $product->save();
        Toastr::success('Product has been inserted successfully', 'Success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categorys = Category::all();
        return view('backend.product.edit',compact('product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        if($request->hasFile('thumbnail_img')){
            $product->thumbnail_img = $request->thumbnail_img->store('uploads/products/thumbnail');
        }
        $photos = array();
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos');
                array_push($photos, $path);
            }
            $product->photos = json_encode($photos);
        }
        $product->unit_price = $request->unit_price;
        $product->published = 1;
        $product->featured = 0;
        $product->discount = $request->discount;
        $product->current_stock = $request->current_stock;
        $product->description = $request->description;
        $product->shipping_cost = $request->shipping_cost;
        $product->save();
        Toastr::success('Product has been update successfully', 'Success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Toastr::success('Product has been delete successfully', 'Success');
        return back();
    }


    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

}
