<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\SuccessResponse;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Show logged in user profile.
     *
     * @return \App\Http\Responses\SuccessResponse
     */
    public function show()
    {
      return new SuccessResponse(
            __('User data retrieved successful'),
            200,
            [Auth::user()]);
    }

    /**
     * Update logged in user profile data.
     *
     * @param \App\Http\Requests\UpdateProfileRequest $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function update(UpdateProfileRequest $request) 
    {
        if ($request->hasFile('profile_photo')) {
            Auth::user()->updateProfilePhoto($request->profile_photo);
        }
        
        return new SuccessResponse(__('Profile photo uploaded successful'));
    }
}
