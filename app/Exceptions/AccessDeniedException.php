<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AccessDeniedException extends AccessDeniedHttpException
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        return response()->json(
                $this->formatResponse(), 
                $this->getStatusCode()
            );
    }

    private function formatResponse(): array
    {
        return [
            'success' => false,
            'message' => __('This action is unauthorized'),
        ];
    }
}