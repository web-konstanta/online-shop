<?php

namespace App\Http\Controllers\Admin\Discounts;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.discounts.index');
    }
}