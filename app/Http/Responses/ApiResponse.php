<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;

class ApiResponse implements Responsable
{
    private int $httpStatus;
    private array $response;

    public function __construct(string $message, int $httpStatus = 200, array $data = null)
    {
        $this->httpStatus = $httpStatus;
        $this->response   = $this->formatResponse($message, $data);
    }

    public function toResponse($request)
    {
        return new JsonResponse($this->response, $this->httpStatus);
    }

    private function formatResponse($message, $data): array
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        return $response = $data ? array_merge($response, ['data' => $data]) : $response;
    }
}
