<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function __invoke(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/user/login')->with('error', 'Пользователь по указанному email не найден');
        }
        if (Hash::check($request->password, $user->password)) {
            session()->put('user', $user->id);
            return redirect()->route('cabinet.index');
        } else {
            return redirect('/user/login')->with('error', 'Пароль введен не верно, повторите попытку');
        }
    }
}
