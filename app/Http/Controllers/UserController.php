<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Auth::user());

        return new ApiResponse(
            __('Users data retrieved successful'),
            200,
            User::all()->toArray());
    }
}
