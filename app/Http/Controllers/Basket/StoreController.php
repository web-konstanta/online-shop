<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::findOrFail($id);
        $user = User::where('id', session('user'))->first();
        $totalPrice = $product->price;

        if ($cart = Cart::where(['session_id' => session()->getId(), 'product_id' => $product->id, 'user_id' => $user->id])->first()) {
            $count = $cart->quantity++;
            $cart->total_price = $totalPrice * ++$count;
            $cart->save();
        } else {
            Cart::create([
                'session_id' => session()->getId(),
                'name' => $product->name,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'total_price' => $totalPrice,
                'user_id' => session('user')
            ]);
        }
        return redirect()->route('basket.index');
    }
}
