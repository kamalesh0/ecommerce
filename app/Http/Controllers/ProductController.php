<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product.index',compact('products'))
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view ('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product_Name'=>'required',
            'Product_price'=>'required',
            'Product_Quantity'=>'required',
        ]);

        product::create($request->all());
        return redirect()->route('products.index')
          ->with('success','Product created Successfully');
    }

    public function show(Product $product)
    {
        return view ('products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view ('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
       $request->validate([]);

       $product->update($request->all());
       return redirect()->route('products.index')
       ->with('success','Product updated Successfully');
    }

    public function destroy(Product $product)
    {
       $product->delete();
       return redirect()->route('products.index')
       ->with('success','Product Deleted Successfully');
    }
}
