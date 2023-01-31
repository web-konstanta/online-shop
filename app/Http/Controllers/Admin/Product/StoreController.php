<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            Product::create($data);
            return redirect()->route('admin.products.index');
        } catch (Exception $exception) {
            abort(500);
        }
    }
}
