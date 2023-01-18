<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function add()
    {
        return view('admin.category.add_category_product');
    }

    public function all()
    {
        $categories = $this->category->simplePaginate(5);
        return view('admin.category.all_category_product', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->slug);
        $this->category->create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('category.all');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('category.all');
    }

    public function edit($id)
    {
        $categories = $this->category->find($id);
        return view('admin.category.edit_category_product', compact('categories'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        return redirect()->route('category.all');
    }
}
