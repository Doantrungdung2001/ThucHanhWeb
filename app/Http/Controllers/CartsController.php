<?php

namespace App\Http\Controllers;

use App\Models\ItemCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function Index(){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        return view('cart.home',['product'=> $res['data']]);
    
    }

    public function SameProduct(){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        return view('cart.same-product',['product'=> $res['data']]);
    
    }

    public function BuyAgain(){
        $cart = DB::table('item_carts')->where('status',1)->get();
        return view('cart.buy-again',compact('cart'));   
    }

    public function AddToCart(Request $req,$id){
        // $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // // $id_user = $req->id;
        // $id_user = Auth::user()->id;
        // $cart_item = new ItemCart();
        // foreach($res['data'] as $prd){
        //     if($prd['sub_products'] != null){
        //         foreach($prd['sub_products'] as $item){
        //             if($item['id'] == $id){
        //                 if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()){
        //                     $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
        //                     $i = $now_quanty->quanty + 1;
        //                     $cost = $prd['cost'] * $i;
        //                     ItemCart::where('id_user',$id_user)
        //                     ->where('id_product',$id)
        //                     ->update(['quanty'=>$i]);
        //                     ItemCart::where('id_user',$id_user)
        //                     ->where('id_product',$id)
        //                     ->update(['total_price'=>$cost]);
        //                 }else{
        //                     $cart_item->id_user = $id_user;
        //                     $cart_item->id_product = $item['id'];
        //                     $cart_item->name = $prd['name'];
        //                     $cart_item->quanty = 1;
        //                     $cart_item->size = $item['size'];
        //                     $cart_item->color = $item['color'];
        //                     $cart_item->price = $prd['cost'];
        //                     $cart_item->total_price = $prd['cost'];
        //                     $cart_item->image_url = $item['image_url'];
        //                     $cart_item->status = 1;

        //                     $cart_item->save();
        //                 }
        //             }
        //         }
        //     }
        // }
        $id_user = Auth::user()->id;
        $cart_item = new ItemCart();
        $item = DB::table('products')->where('id',$id)->first();
        if($item->quantity > 0){
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
                $cart_item->size = $item['size'];//
                $cart_item->color = $item['color'];//
                $cart_item->price = $item->price;
                $cart_item->total_price = $item->price;
                $cart_item->image_url = $item['image_url'];//
                $cart_item->status = 1;
        
                $cart_item->save();
            }
        }
    }

    public function ViewToCart(){
        $cart = DB::table('item_carts')->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('status',1)->sum('total_price');
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
}