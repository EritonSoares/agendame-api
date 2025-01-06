<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    public function __invoke()
    {
        $login = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        if (auth()->attempt($login)) {
            request()->session()->regenerate();

            return auth()->user();
        }
    }
}
