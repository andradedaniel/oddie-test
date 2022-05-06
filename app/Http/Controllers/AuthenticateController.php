<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    /**
     * Attempt to authenticate and create API Token.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function login(LoginRequest $request): SuccessResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            $this->throwFailedAuthenticationException();
        }

        $token = auth()->user()->createToken('token')->plainTextToken;

        return new SuccessResponse(__('Login successful'), 200, ['token' => $token]);
    }

    /**
     * Delete current user API Token.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function logout(Request $request): SuccessResponse
    {
        $request->user()->currentAccessToken()->delete();

        return new SuccessResponse(__('Logout successful'));
    }

    protected function throwFailedAuthenticationException()
    {
        throw ValidationException::withMessages([
               'email' => [trans('auth.failed')],
        ]);
    }
}
