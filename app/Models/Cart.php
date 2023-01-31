<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'order_cart', 'user_id', 'cart_id');
    }

    public static function getTotalProductsPrice(): float
    {
        $cartProducts = self::where('user_id', session('user'))->get();
        $totalProductsPrice = 0;
        foreach ($cartProducts as $cart) {
            $totalProductsPrice += $cart->total_price;
        }
        return $totalProductsPrice;
    }

    public static function productsQuantity(): int
    {
        $productsInCart = self::where('user_id', session('user'))->get();
        $quantity = 0;
        foreach ($productsInCart as $product) {
            $quantity += $product->quantity;
        }
        return $quantity;
    }
}
