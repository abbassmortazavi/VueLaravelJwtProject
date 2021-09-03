<?php

namespace App\Http\Controllers;

use App\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        Product::create($request->all() + ['user_id'=>Auth::id()]);
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }
    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return 'deleted ok';
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product)
            return response()->json($product);

        return response()->json(['error'=>'product not found...'],404);
    }
}
