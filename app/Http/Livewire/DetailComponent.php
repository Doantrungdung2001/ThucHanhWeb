<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;

class DetailComponent extends Component
{
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $colors = Color::all();
        $sizes = Size::all();
        return view('livewire.detail-component', ['product' => $product, 'colors' => $colors, 'sizes' => $sizes])->layout("layouts.base");
    }
}
