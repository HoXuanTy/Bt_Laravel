<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\Session;

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


    public function getAddToCart(Request $req, $id)
    {
        if (Session::has('user')) {
            if (Product::find($id)) {
                $product = Product::find($id);
                $oldCart = Session('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->add($product, $id);
                $req->session()->put('cart', $cart);
                return redirect()->back();
            } else {
                return '<script>alert("Không tìm thấy sản phẩm này.");window.location.assign("/");</script>';
            }
        } else {
            return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");window.location.assign("/login");</script>';
        }
    }		
}
