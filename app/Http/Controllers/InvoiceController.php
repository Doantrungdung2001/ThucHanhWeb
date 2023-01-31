<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\invoice;
use Illuminate\Support\Facades\Auth;
use App\Models\ItemCart;
class InvoiceController extends Controller
{
    public function Invoice(){
        $id_user = Auth::user()->id;
        $product = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
        return view('cart.invoice',compact('product'),compact('totalQuanty','totalPrice'));   
    }
    
    public function SaveInvoice(){
        $id_user = Auth::user()->id;
        $invoice = new invoice();
        $product = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();
        $id_invoice = rand(1,999);
        foreach($product as $item){
            
            DB::table('invoices')->insert([
                'id_user' => $id_user,
                'id_invoice' => $id_invoice,
                'id_product' => $item->id_product,
                'name' => $item->name,
                'quanty' => $item->quanty,
                'size' => $item->size,
                'color' => $item->color,
                'price' => $item->price,
                'total_price'=>$item->total_price,
                'image_url'=>$item->image_url,
                'status'=>1
            ]);
        }
        if(ItemCart::where('id_user',$id_user)->exists()){
            ItemCart::where('id_user',$id_user)->where('status',1)
            ->update(['status'=>2]);
        }
        return redirect(url('/'));  
    }
}
