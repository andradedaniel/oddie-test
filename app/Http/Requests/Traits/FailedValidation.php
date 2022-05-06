<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait FailedValidation
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
                        'success' => false,
                        'message' => 'The given data was invalid.',
                        'errors' => $validator->errors(),
                    ], 422);

        throw (new ValidationException($validator, $response))->errorBag($this->errorBag);
    }
}