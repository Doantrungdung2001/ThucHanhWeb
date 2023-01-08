<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Components\Recusive;
use Illuminate\Pagination\Paginator;
class BrandController extends Controller
{
    private $brand;

    public function __construct(Brand $brand) {
        $this->brand = $brand;
    }

    public function add() {
        return view('admin.brand.add_brand');
    }

    public function all() {
        $brands = $this->brand->simplePaginate(5);
        return view('admin.brand.all_brand', compact('brands'));
    }
    
    public function store(Request $request) {
        $this->brand->create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect()->route('brand.all');
    }

    public function delete($id) {
        $this->brand->find($id)->delete();
        return redirect()->route('brand.all');
    }

    public function edit($id) {
        $brand = $this->brand->find($id);
        return view('admin.brand.edit_brand', compact('brand'));
    }

    public function update($id, Request $request) {
        $this->brand->find($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect()->route('brand.all');
    }
}
