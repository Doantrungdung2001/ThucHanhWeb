<?php

namespace App\Http\Controllers;

use App\Models\ItemCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartsController extends Controller
{
    public function Index(){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        return view('cart.home',['product'=> $res['data']]);
    
    }

    public function SameProduct(){
        $id_user = Auth::user()->id;
        // $id_user = 2;
        $item = DB::table('item_carts')
                ->join('products','item_carts.id_product','=','products.id')
                ->where('id_user',$id_user)->where('status',1)->first();
        //$product_brand = DB::table('brand')->where('id_pr')
        // $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // return view('cart.same-product',['product'=> $res['data']]);
        // return $item->brand_id;
        $brand_prd = DB::table('products')->where('brand_id',$item->brand_id)->get();
        return view('cart.same-product',['brand_product'=> $brand_prd]);
    }

    public function BuyAgain(){
        $cart = DB::table('item_carts')->where('status',1)->get();
        return view('cart.buy-again',compact('cart'));   
    }

    public function AddToCart(Request $req,$id){
        //$req->value = 
        // $id_user = 2;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
        } else {
            return Redirect::to('/login');
        }

        
        $cart_item = new ItemCart();
        $color_id = $req->color;
        $size_id = $req->size;
        $quatity_prd = $req->quatity;
        $item = DB::table('products')->where('id',$id)->first();
        if($item){
            if($item->quantity > 0){
                $size =DB::table('sizes')->where('id',$size_id)->first();
                $color =DB::table('colors')->where('id',$color_id)->first();
                if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()){
                    $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
                    $i = $now_quanty->quanty + 1;
                    $cost = $now_quanty->price * $i;
                    ItemCart::where('id_user',$id_user)
                        ->where('id_product',$id)
                        ->update(['quanty'=>$i]);
                    ItemCart::where('id_user',$id_user)
                            ->where('id_product',$id)
                            ->update(['total_price'=>$cost]);
                }else{
                    $cart_item->id_user = $id_user;
                    $cart_item->id_product = $item->id;
                    $cart_item->name = $item->name;
                    $cart_item->quanty = 1;
                    // $cart_item->size = $size->name;
                    $cart_item->size = "XL";
                    // $cart_item->color = $color->name;
                    $cart_item->color = "Bule";
                    $cart_item->price = $item->price;
                    $cart_item->total_price = $item->price;
                    $cart_item->image_url = $item->image_path;
                    $cart_item->status = 1;
            
                    $cart_item->save();
                }
                //return $size;
               
                }
        }
        return $cart_item;
    }

    public function ViewToCart(){
        $id_user = Auth::user()->id;
        $cart = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->sum('total_price');
        return view('cart.cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function DeleteItemListToCart($id){
       if(ItemCart::where('id_product',$id)->exists()){
        ItemCart::where('id_product',$id)
        ->update(['status'=>0]);
       }
       $cart = DB::table('item_carts')->where('status',1)->get();
       $totalQuanty = DB::table('item_carts')->where('status',1)->sum('quanty');
       $totalPrice = DB::table('item_carts')->where('status',1)->sum('total_price');
       return view('cart.list-cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function SaveItemListToCart(Request $req,$id,$quanty){
        $id_user = Auth::user()->id;
        if(ItemCart::where('id_product',$id)->exists()){
            ItemCart::where('id_product',$id)
            ->update(['quanty'=>$quanty]);
            $now_quanty = ItemCart::where('id_product',$id)->where('status',1)->first();
            $i = $now_quanty->quanty;
            $cost = $now_quanty->price * $i;
            ItemCart::where('id_product',$id)
            ->update(['total_price'=>$cost]);
        }
        $cart = DB::table('item_carts')->where('status',1)->get();
        $totalQuanty = DB::table('item_carts')->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('status',1)->sum('total_price');
        return view('cart.list-cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function AddToCart1(Request $request, $id) {
        //dd($request);
        
        // $request->color;
        return $request->quatity;
    }
}