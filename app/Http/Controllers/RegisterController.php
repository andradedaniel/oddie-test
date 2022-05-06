<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Responses\SuccessResponse;

class RegisterController extends Controller
{
    /**
     * Create a new registered user.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \App\Http\Responses\SuccessResponse;
     */
    public function store(RegisterRequest $request): SuccessResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'whatsapp' => $request->whatsapp,
            'is_admin' => $request->is_admin
        ]);

        return new SuccessResponse(__('User created'), 201);
    }
}
