<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Responses\ApiResponse;

class RegisterController extends Controller
{
    /**
     * Create a new registered user.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \App\Http\Responses\ApiResponse;
     */
    public function store(RegisterRequest $request): ApiResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'whatsapp' => $request->whatsapp,
            'is_admin' => $request->is_admin
        ]);

        return new ApiResponse(__('User created'), 201);
    }
}
