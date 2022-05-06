<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;


class FailedValidationResponse implements Responsable
{
    private int $httpStatus;
    private array $response;

    public function __construct(ValidationException $e)
    {
        $this->response   = $this->formatResponse($e);
        $this->httpStatus = $e->status;
    }

    public function toResponse($request)
    {
        return new JsonResponse($this->response, $this->httpStatus);
    }

    private function formatResponse($exception): array
    {
        return [
            'success' => false,
            'message' => 'The given data was invalid.',
            'errors' => $exception->errors()
        ];
    }
}
