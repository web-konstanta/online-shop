<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = User::where('id', session('user'))->first();
        return view('cabinet.index', compact('user'));
    }
}
