<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class IndexController extends Controller
{
    public function __invoke()
    {
        $productsQuantity = Cart::productsQuantity();
        $productsPrice = Cart::getTotalProductsPrice();
        if (!$productsPrice && !$productsQuantity) {
            return back()->with('error', 'Для оформления заказа необходимо добавить товары в корзину');
        }
        return view('order.index', compact('productsQuantity', 'productsPrice'));
    }
}
