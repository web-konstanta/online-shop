<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
