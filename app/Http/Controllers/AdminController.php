<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\invoice;

class AdminController extends Controller
{
    private User $user;
    private Product $product;
    private Category $category;
    private invoice $invoice;

    public function __construct(User $user, Product $product, Category $category, invoice $invoice) {
        $this->user = $user;
        $this->product = $product;
        $this->category = $category;
        $this->invoice = $invoice;
    }

    public function redirectUser() {
        if (Auth::check()) {
            return view('admin.dashboard');
        }
    }

    public function show_dashboard(){
        $total = [];
        array_push($total, $this->user->count());
        array_push($total, $this->product->count());
        array_push($total, ($this->invoice->select('id_invoice')->groupBy('id_invoice')->get())->count());

        // User table
        $users = $this->user
        ->select('role', DB::raw('count(id) as countUser'))
        ->groupBy('role')
        ->get();
        $role = [];
        $countUser = [];
        foreach ($users as $user) {
            array_push($role, $user->role);            
            array_push($countUser, $user->countUser);            
        }
        $chart = new Chart;
        $chart->labels = $role;
        $chart->dataset = $countUser;

        //Product table
        $products = $this->product
        ->select('category_id', DB::raw('count(id) as countProduct'))
        ->groupBy('category_id')
        ->get();
        $categories = []; 
        $countProduct = [];
        foreach($products as $product) {
            array_push($categories, ($this->category->find($product->category_id))->name);
            array_push($countProduct, $product->countProduct);
        }
        $chart1 = new Chart;
        $chart1->labels = $categories;
        $chart1->dataset = $countProduct;

        //Invoice table
        $invoices = $this->invoice->all();
        $money = 0;
        foreach($invoices as $invoice) {
            $money += $invoice->quanty * $invoice->price;
        }
        array_push($total, $money);

        $topProduct = $this->invoice
        ->select('name', DB::raw('SUM(quanty) as totalProduct'))
        ->groupBy('name')
        ->orderBy('name')
        ->limit(3)
        ->get();
        return view('admin.dashboard', compact('total','chart', 'chart1', 'topProduct'));
    }
}
