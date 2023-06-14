<?php

namespace App\Http\Controllers;

use App\Models\Bbl_Lazada;
use Illuminate\Http\Request;

class lazadaController extends Controller
{
    public function getProducts()
    {
        $products = Bbl_Lazada::all();
        return response()->json($products);
    }

    public function getOneProduct($id)
    {
        $product = Bbl_Lazada::find($id);
        return response()->json($product);
    }


    public function addProduct(Request $request)
    {
        $product = new Bbl_Lazada();
        $product->image = $request->input('image');
        $product->name = $request->input('name');
        $product->shop_image = $request ->input('shop_image');
        $product->save();
        return $product;
    }


    public function uploadImage(Request $request)
    {
        // process image						
        if ($request->hasFile('uploadImage')) {
            $file = $request->file('uploadImage');
            $fileName = $file->getClientOriginalName();
            $file->move('Source\image\product', $fileName);
            return response()->json(["message" => "ok"]);
        } 
        else return response()->json(["message" => "false"]);
    }			


}
