<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class FailedValidationException extends ValidationException
{
    private $exception; 

    public function __construct(ValidationException $exception)
    {
        $this->exception = $exception;
    }

    public function render()
    {
        return response()->json(
                $this->formatResponse($this->exception), 
                $this->status
            );
    }

    private function formatResponse($exception): array
    {
        return [
            'success' => false,
            'message' => __('The given data was invalid.'),
            'errors' => $exception->errors()
        ];
    }
}