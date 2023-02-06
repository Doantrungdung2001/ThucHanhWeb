<?php

namespace App\Http\Controllers;

use App\Models\ItemCart;
use App\Models\invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;
use Illuminate\Support\Facades\Session;
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
        if(Product::where('brand_id',$item->brand_id)->exists()){
            $brand_prd = DB::table('products')->where('brand_id',$item->brand_id)->get();
            return view('cart.same-product',['brand_product'=> $brand_prd]);
        }
        //return view('cart.cart');
    }

    public function BuyAgain(){
        $id_user = Auth::user()->id;
        $cart = DB::table('invoices')->where('id_user',$id_user)->where('status',1)->get();
        // $cart = invoice::groupBy('id_product')->where('id_user',$id_user)->where('status',1)->get();
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
                    $cart_item->quanty = $quatity_prd;
                    $cart_item->size = $size->name;
                    $cart_item->color = $color->name;
                    // $cart_item->size = "XL";
                    
                    // $cart_item->color = "Bule";
                    $cart_item->price = $item->price;
                    $cart_item->total_price = $item->price;
                    $cart_item->image_url = $item->image_path;
                    $cart_item->status = 1;
            
                    $cart_item->save();
                }
                             
                }
                //return $color_id;
        }
        //return $cart_item;
    }

    public function BuyAgainProduct(Request $req,$id){
        //$req->value = 
        // $id_user = 2;

        $id_user = Auth::user()->id;
        $cart_item = new ItemCart();
        $item = DB::table('invoices')->where('id',$id)->first();
        
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
                $cart_item->id_product = $item->id_product;
                $cart_item->name = $item->name;
                $cart_item->quanty = 1;
                $cart_item->size = $item->size;
                $cart_item->color = $item->color;
                $cart_item->price = $item->price;
                $cart_item->total_price = $item->price;
                $cart_item->image_url = $item->image_url;
                $cart_item->status = 1;
        
                $cart_item->save();
            }    
                             
            
                //return $color_id;
        
        $cart = DB::table('invoices')->where('id_user',$id_user)->where('status',1)->get();
        return view('cart.list-product',compact('cart'));
    }
    public function ViewToCart(Request $req){
        $id_user = Auth::user()->id;
        $cart = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user', $id_user)->where('status',1)->sum('total_price');
        return view('cart.cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function DeleteItemListToCart(Request $req,$id){
        $id_user = Auth::user()->id;
       if(ItemCart::where('id_product',$id)->exists()){
        ItemCart::where('id_product',$id)->where('id_user', $id_user)->where('status',1)
        ->update(['status'=>0]);
       }
       $cart = DB::table('item_carts')->where('status',1)->get();
       $totalQuanty = DB::table('item_carts')->where('status',1)->sum('quanty');
       $totalPrice = DB::table('item_carts')->where('status',1)->sum('total_price');
       return view('cart.list-cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function DeleteItemListProduct(Request $req,$id){
        $id_user = Auth::user()->id;
       if(invoice::where('id_product',$id)->exists()){
        invoice::where('id_product',$id)->where('id_user', $id_user)->where('status',1)
        ->update(['status'=>0]);
       }
       $cart = DB::table('invoices')->where('status',1)->get();
       return view('cart.list-product',compact('cart'));
    }

    public function SaveItemListToCart(Request $req,$id,$quanty){
        $id_user = Auth::user()->id;
        if(ItemCart::where('id_product',$id)->where('id_user',$id_user)->exists()){
            ItemCart::where('id_product',$id)
            ->update(['quanty'=>$quanty]);
            $now_quanty = ItemCart::where('id_product',$id)->where('id_user',$id_user)->where('status',1)->first();
            $i = $now_quanty->quanty;
            $cost = $now_quanty->price * $i;
            ItemCart::where('id_product',$id)
            ->update(['total_price'=>$cost]);
        }
        $cart = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();
        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
        return view('cart.list-cart',compact('cart'),compact('totalQuanty','totalPrice'));
    }

    public function AddToCart1(Request $request, $id) {
        //dd($request);
        if (Auth::check()) {
            $id_user = Auth::user()->id;
        } else {
            return Redirect::to('/login');
        }
        // $request->color;
        $cart_item = new ItemCart();
        $color = $request->color;
        $size = $request->size;
        $quatity_prd = $request->quatity;
        $item = DB::table('products')->where('id',$id)->first();
        if($item){
            $color_id = DB::table('colors')->where('name', $color)->first();
            $size_id = DB::table('sizes')->where('name', $size)->first();
            $quantity_item = DB::table('quantities')->where('product_id',$id)->where('color_id', $color_id->id)->where('size_id', $size_id->id)->first();
            if($quantity_item->quantity < $quatity_prd){
                // Session::put('message','Số lượng mặt hàng không đủ!!!');
                if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()){
                    $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
    
                    $cost = $now_quanty->price * $quantity_item->quantity;
                    ItemCart::where('id_user',$id_user)
                        ->where('id_product',$id)
                        ->update(['quanty'=>$quantity_item->quantity]);
                    ItemCart::where('id_user',$id_user)
                            ->where('id_product',$id)
                            ->update(['total_price'=>$cost]);
                }else{
                    $cart_item->id_user = $id_user;
                    $cart_item->id_product = $item->id;
                    $cart_item->name = $item->name;
                    $cart_item->quanty = $quantity_item->quantity-1;
                    $cart_item->size = $size;
                    $cart_item->color = $color;
                        // $cart_item->size = "XL";
                        
                        // $cart_item->color = "Bule";
                    $cart_item->price = $item->price;
                    $cart_item->total_price = $item->price;
                    $cart_item->image_url = $item->image_path;
                    $cart_item->status = 1;
                
                    $cart_item->save();
                }
                return redirect($request->url());
                             
            }else{
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
                    $cart_item->quanty = $quatity_prd;
                    $cart_item->size = $size;
                    $cart_item->color = $color;
                    // $cart_item->size = "XL";
                    
                    // $cart_item->color = "Bule";
                    $cart_item->price = $item->price;
                    $cart_item->total_price = $item->price;
                    $cart_item->image_url = $item->image_path;
                    $cart_item->status = 1;
            
                    $cart_item->save();
                }
                return redirect('/Cart');
            }
                //return $color_id;
        }
        //dd($quantity_item);
    }
    public function UpdateInvoice(Request $request){
        $id_user = Auth::user()->id;
        if(ItemCart::where('id_user',$id_user)->exists()){
            ItemCart::where('id_user',$id_user)->where('status',1)
            ->update(['status'=>2]);
        }
        return redirect(url('/'));
    }
    public function UpdateQuatityCart(Request $request){
        $id_user = Auth::user()->id;
        if($id_user){
            $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
            return view('layouts.base',['totalQuanty'=>$totalQuanty]);
        }
    }
        
}