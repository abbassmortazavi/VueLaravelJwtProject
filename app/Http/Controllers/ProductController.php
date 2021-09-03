<?php

namespace App\Http\Controllers;

use App\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function store(Request $request)
    {
        //Log::info($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $explode = explode(',' , $request->img);
        $decoded = base64_decode($explode[1]);
        if (str_contains($explode[0] , 'jpeg'))
            $extention = 'jpg';
        else
            $extention = 'png';
        $fileName = Str::random(2) . '.' .$extention;
        $path = public_path().'/images/'.$fileName;
        file_put_contents($path , $decoded);

        Product::create($request->except('img') + [
            'user_id'=>Auth::id(),
                'img'=>$fileName
            ]);
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
