<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\TypeProduct;


class PageController extends Controller
{
    //
    public function getIndex(){

        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(8);
        $spkhuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        $type_pro = TypeProduct::all();

        return View('page.trangchu',compact('slide','new_product','spkhuyenmai','type_pro'));
    }

    public function getDetail(Request $request){
        $san_pham = Product::where('id', $request->id)->first();
        
    }

    public function typeProduct($type){
        $type_pro = TypeProduct::all();
        $typePro = Product::where('id_type', $type)->get();

        return View('page.TypeProduct', compact('typePro','type_pro'));
    }

    public function getIndexAdmin(){

        
    }
}
