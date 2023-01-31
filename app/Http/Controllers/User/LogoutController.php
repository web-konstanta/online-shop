<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        if (session()->has('user')) {
            session()->forget('user');
        }
        return redirect()->route('site.index');
    }
}
