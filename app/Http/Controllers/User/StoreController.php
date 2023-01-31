<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            $login = $data['login'];
            $email = $data['email'];
            $password = $data['password'];
            $password_confirm = $data['password_confirm'];
            if ($password !== $password_confirm) {
                return redirect('/user/register')->with('error', 'Пароли не совпадают');
            }
            $user = [
                'login' => $login,
                'email' => $email,
                'password' => Hash::make($password)
            ];
            User::create($user);
        } catch (Exception $exception) {
            abort(500);
        }
        return redirect('/user/login')->with('success', 'Вы успешно зарегистрировались');
    }
}
