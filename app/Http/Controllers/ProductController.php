<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Components\Recusive;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    private $product;
    private $category;
    private $brand;
    private $color;
    private $size;
    private $productColor;
    private $productSize;

    public function __construct(Product $product, Category $category, Brand $brand, Color $color, Size $size, 
    ProductColor $productColor, ProductSize $productSize) {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
        $this->color = $color;
        $this->size = $size;
        $this->productColor = $productColor;
        $this->productSize = $productSize;
    }

    public function add() {
        $htmlOptionCategory = $this->getCategory('');
        $htmlOptionBrand = $this->getBrand('');
        $htmlOptionColor = $this->getColor('');
        $htmlOptionSize = $this->getSize('');
        return view('admin.product.add_product', compact('htmlOptionCategory', 'htmlOptionBrand', 'htmlOptionColor', 'htmlOptionSize'));
    }

    public function getCategory($parent_id) { 
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    public function getBrand($brand_id) {
        $data = $this->brand->all();

        $htmlOption = '';
        foreach ($data as $value) {
            if ($brand_id == $value['id']) {
                $htmlOption .= "<option selected value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
            }
            else {
                $htmlOption .= "<option value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
            }
        }
        return $htmlOption;
    }

    public function getColor($product_id) {
        $data = $this->color->all();
        $htmlOption = '';
         if($product_id == '') {
            foreach ($data as $value) {
                $htmlOption .= "<option value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
            }
        }
        else {
            $productColor = $this->productColor->where('product_id', $product_id)->get();
            $array = [];
            foreach ($productColor as $color) {
                array_push($array, $color['color_id']);
            }
            foreach ($data as $value) {
                if(in_array($value['id'], $array)) {
                    $htmlOption .= "<option selected value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
                }
                else {
                    $htmlOption .= "<option value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
                }
            }
        }
        return $htmlOption;

    }

    public function getSize($product_id) {
        $data = $this->size->all();
        $htmlOption = '';
        if($product_id == '') {
            foreach ($data as $value) {
                $htmlOption .= "<option value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
            }
        }
        else {
            $productSize = $this->productSize->where('product_id', $product_id)->get();
            $array = [];
            foreach ($productSize as $size) {
                array_push($array, $size['size_id']);
            }
            foreach ($data as $value) {
                if(in_array($value['id'], $array)) {
                    $htmlOption .= "<option selected value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
                }
                else {
                    $htmlOption .= "<option value=\"" .$value['id']. "\" >" . $value['name'] . "</option>";
                }
            }
        }
        return $htmlOption;
    }

    public function all() {
        $products = $this->product->simplePaginate(5);
        return view('admin.product.all_product', compact('products'));
    }
    
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            //Insert product
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'image_path' => $request->image_path,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'quantity' => 0
            ];
            $product = $this->product->create($dataProductCreate);
            
            //Insert product color information
            if (!empty($request->color)) {
                foreach ($request->color as $color) {
                    $product->colors()->create([
                        'color_id' => $color
                    ]);
                }
            }
            
            //Insert product size information
            if(!empty($request->size)) {
                foreach ($request->size as $size) {
                    $product->sizes()->create([
                        'size_id' => $size
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.all');
        } catch (\Throwable\Exception $exception) {
            DB::rollBack();
            Log::error("Message: ".$exception->getMessage() . "Line: ".$exception->getLine());
        }
    }

    public function delete($id) {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'done'

            ], 200);
        }
        catch(Exception $e){
            Log::error("Message: ".$exception->getMessage() . "Line: ".$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'

            ], 500);
        }
    }

    public function edit($id) {
        $product = $this->product->find($id);
        $htmlOptionCategory = $this->getCategory($product->category_id);
        $htmlOptionBrand = $this->getBrand($product->brand_id);
        $htmlOptionColor = $this->getColor($product->id);
        $htmlOptionSize = $this->getSize($product->id);
        
        return view('admin.product.edit_product', compact('product','htmlOptionCategory', 'htmlOptionBrand', 'htmlOptionColor', 'htmlOptionSize'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            //Update product
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'image_path' => $request->image_path,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'quantity' => 0
            ];
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            //Update product color information
            if (!empty($request->color)) {
                $this->productColor->where('product_id', $id)->delete();
                foreach ($request->color as $color) {
                    $product->colors()->create([
                        'color_id' => $color
                    ]);
                }
            }
            
            //Update product size information
            if(!empty($request->size)) {
                $this->productSize->where('product_id', $id)->delete();
                foreach ($request->size as $size) {
                    $product->sizes()->create([
                        'size_id' => $size
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.all');
        } catch (\Throwable\Exception $exception) {
            DB::rollBack();
            Log::error("Message: ".$exception->getMessage() . "Line: ".$exception->getLine());
        }
    }
}
