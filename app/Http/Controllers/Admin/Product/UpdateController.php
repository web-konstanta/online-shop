<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images/', $data['image']);
        }
        $product->update($data);
        return redirect()->route('admin.products.index');
    }
}
