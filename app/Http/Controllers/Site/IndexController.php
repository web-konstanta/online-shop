<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::where('is_recommended', 0)->paginate(6);
        $recommendedProducts = Product::where('is_recommended', 1)->get();
        return view('site.index', compact('products', 'recommendedProducts'));
    }
}
