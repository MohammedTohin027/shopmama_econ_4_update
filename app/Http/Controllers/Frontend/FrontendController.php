<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->latest()->get();
        $top_categories = Category::where('status', 1)->limit(2)->get();
        return view('frontend.index', compact('sliders', 'top_categories'));
    }

    public function productViewAjax($id){
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);
        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
}