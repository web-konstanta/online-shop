<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'order_cart', 'cart_id', 'user_id');
    }

    public static function isGuest(): bool
    {
        if (session()->has('user')) {
            return true;
        }
        return false;
    }
}
