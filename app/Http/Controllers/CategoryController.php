<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Pagination\Paginator;
class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function add() {
        $htmlOption = $this->getCategory('');
        return view('admin.add_category_product', compact('htmlOption'));
    }

    public function all() {
        $categories = $this->category->simplePaginate(5);
        return view('admin.all_category_product', compact('categories'));
    }

    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parentID' => $request->parentID,
            'description' => $request->description
        ]);
        return redirect()->route('category.all');
    }

    public function getCategory($parentID) { 
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentID);
        return $htmlOption;
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('category.all');
    }

    public function edit($id) {
        $categories = $this->category->find($id);
        $htmlOption = $this->getCategory($categories->parentId);
        return view('admin.edit_category_product', compact('categories', 'htmlOption'));
    }

    public function update($id, Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parentID' => $request->parentID,
            'description' => $request->description
        ]);
        return redirect()->route('category.all');
    }
}
