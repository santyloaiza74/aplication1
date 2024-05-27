<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\search;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();
        $search= "";
        return view('products.index', compact('products','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->sku= $request->sku;
        $product->name= $request->name;
        $product->ammount= $request->ammount;
        $product->unit= $request->unit;
        $product->save();
        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product=Product::findOrFail();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->sku= $request->sku;
        $product->name= $request->name;
        $product->ammount= $request->ammount;
        $product->unit= $request->unit;
        $product->save();
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete($product);
        return Redirect::route('products.index');
    }
    public function search(Request $request)
    {
        $name= $request->search;
        $products= Product::where('name', 'like', '%'. $name. '%')->get();
        $search= $name;
        return view('products.index', compact('products','search'));
    }
}
