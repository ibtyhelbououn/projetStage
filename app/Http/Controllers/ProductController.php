<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('category')->get();


        // dump($products);

         return view('products',compact('products'));

        // return view('products')->with('products',$products);
              
    }

    public function add()
    {
        $categories = Category::all();
        return view('add-product',compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Product::create($input);

        return redirect('/products');
        
    }

    public function edit($product)
    {
        $product = Product::find($product);
        $categories = Category::all();
        return view('/edit-product',compact('product','categories'));
    }

    public function update(Request $request,$product)
    {
        $input = $request->all();
        $product = Product::find($product);
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->tax = $input['tax'];
        $product->categoryID = $input['categoryID'];

        $product->save();

        return redirect('/products');
    }

    public function delete($product)
    {
        Product::find($product)->delete();
        return redirect()->back();
    }

    // public function invoice()
    // {
    //     $products = Product::with('category')->get();
    //     return view('/invoice',compact('products'));
    // }
}
