<?php

namespace App\Http\Controllers\Admin\Discounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\DiscountRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function __invoke(DiscountRequest $request)
    {
        $data = $request->validated();
        if ($data['discount_value'] == 1) {
            $productsPrice = Product::select('price')->get();
            foreach ($productsPrice as $key => $value) {
                DB::table('products')
                    ->where('id', ++$key)
                    ->update(['price' => $value->price / 100 * (100 + $data['discount'])]);
            }
            dd('success');
        } else {
            dd('fail');
        }
    }
}
