<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(6);
        $recommendedProducts = Product::where('is_recommended', 1)->get();
        return view('site.index', compact('products', 'recommendedProducts'));
    }
}
