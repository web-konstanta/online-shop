<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('catalog.category', compact('products'));
    }
}
