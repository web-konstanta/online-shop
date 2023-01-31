<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }

    public static function getStatusText(int $status): string
    {
        switch ($status)
        {
            case 1:
                return 'Новый заказ';
            case 2:
                return 'В обработке';
            case 3:
                return 'Доставляется';
            case 4:
                return 'Закрыт';
        }
    }
}
