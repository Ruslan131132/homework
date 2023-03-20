<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['password' => 'Неверный email/пароль']);
        }

        return redirect()->route('home');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'login'),
            ['password' => bcrypt($request->password)]
        ));

        Auth::login($user);

        return redirect()->route('home');
    }
}
