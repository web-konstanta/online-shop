<?php

namespace App\Service;

class UserService
{
    public function store(array $data)
    {
        $login = $data['login'];
        $email = $data['email'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];
        if ($password !== $password_confirm) {
            return redirect()->route('user.register');
        }
        dd('success');
    }
}
