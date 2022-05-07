<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;

class UnauthenticatedException extends AuthenticationException
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        return response()->json($this->formatResponse(), 401);
    }

    private function formatResponse(): array
    {
        return [
            'success' => false,
            'message' => __('Unauthenticated'),
        ];
    }
}