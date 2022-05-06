<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\RegisterResponse;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Create a new registered user.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \App\Http\Responses\RegisterResponse;
     */
    public function store(RegisterRequest $request): RegisterResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'whatsapp' => $request->whatsapp,
            'is_admin' => $request->is_admin
        ]);

        return app(RegisterResponse::class);
    }
}
