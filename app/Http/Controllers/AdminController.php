<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    private User $user;
    private Product $product;

    public function __construct(User $user, Product $product, Category $category) {
        $this->user = $user;
        $this->product = $product;
        $this->category = $category;
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

        // dd($total);
        return view('admin.dashboard', compact('total','chart', 'chart1'));
    }
}
