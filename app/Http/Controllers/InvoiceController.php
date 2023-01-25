<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\invoice;
class InvoiceController extends Controller
{
    public function Invoice(){
        $product = DB::table('item_carts')->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('status',1)->sum('total_price');
        return view('cart.invoice',compact('product'),compact('totalQuanty','totalPrice'));   
    }
    
    public function SaveInvoice(){
        $invoice = new invoice();
        $product = DB::table('item_carts')->where('status',1)->get();

        foreach($product as $item){
            $invoice->id_user = 2;
            $invoice->id_product = $item->id_product;
            $invoice->name = $item->name;
            $invoice->quanty = $item->quanty;
            $invoice->size = $item->size;
            $invoice->color = $item->color;
            $invoice->price = $item->price;
            $invoice->total_price = $item->total_price;
            $invoice->image_url = $item->image_url;
            $invoice->status = $item->status;
            $invoice->save();
        }    
    }
}
