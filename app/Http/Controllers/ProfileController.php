<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\ApiResponse;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Show logged in user profile.
     *
     * @return \App\Http\Responses\ApiResponse
     */
    public function show()
    {
      return new ApiResponse(
            __('User data retrieved successful'),
            200,
            [Auth::user()]);
    }

    /**
     * Update logged in user profile data.
     *
     * @param \App\Http\Requests\UpdateProfileRequest $request
     * @return \App\Http\Responses\ApiResponse
     */
    public function update(UpdateProfileRequest $request) 
    {
        if ($request->hasFile('profile_photo')) {
            Auth::user()->updateProfilePhoto($request->profile_photo);
        }
        
        return new ApiResponse(__('Profile photo uploaded successful'));
    }
}
