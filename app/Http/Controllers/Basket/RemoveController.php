<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;

class RemoveController extends Controller
{
    public function __invoke(int $id)
    {
        $productInCart = Cart::where('product_id', $id)->first();
        $quantity = $productInCart->quantity;
        $totalProductPrice = $productInCart->total_price;
        $result = $totalProductPrice / $quantity * ($quantity - 1);
        $quantity > 1
            ? Cart::where('product_id', $id)
            ->update([
                'total_price' => $result,
                'quantity' => $quantity - 1
            ])
            : Cart::where('product_id', $id)->delete();
        return redirect()->back();
    }
}
