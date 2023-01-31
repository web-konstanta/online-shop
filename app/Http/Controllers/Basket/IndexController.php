<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $productsInCart = Cart::where('user_id', session('user'))->get();
        return view('basket.index', compact('productsInCart'));
    }
}
