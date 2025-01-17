<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidAuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  LoginRequest  $request
     * @return UserResource
     * @throws InvalidAuthenticationException
     */
    public function __invoke(LoginRequest $request): UserResource
    {
        //sleep(2);
        $input = $request->validated();

        if (!Auth::attempt($input)) {
            throw new InvalidAuthenticationException();
        }

        request()->session()->regenerate();

        return new UserResource(Auth::user());
    }
}
