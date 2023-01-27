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
        //$req->value = 
        // $id_user = Auth::user()->id;
        $id_user = 2;
        $cart_item = new ItemCart();
        $item = DB::table('products')->where('id',$id)->first();
        if($item){
            if($item->quantity > 0){
                $size = DB::table('sizes')
                        ->rightJoin('product_sizes', 'sizes.id', '=', 'product_sizes.size_id')
                        ->rightJoin('products', 'product_sizes.product_id', '=', 'products.id')
                        ->where('products.id',$id)
                        ->get();
                $color = DB::table('colors')
                        ->join('product_colors', 'colors.id', '=', 'product_colors.color_id')
                        ->join('products', 'product_colors.product_id', '=', 'products.id')
                        ->select('colors.name')
                        ->where('products.id',$id)
                        ->first();
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
                    $cart_item->size = "XL";
                    $cart_item->color = "red";//
                    $cart_item->price = $item->price;
                    $cart_item->total_price = $item->price;
                    $cart_item->image_url = $item->image_path;
                    $cart_item->status = 1;
            
                    $cart_item->save();
                }
                //return $size;
                return $cart_item;
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