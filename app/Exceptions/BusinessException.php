<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessException extends Exception
{
    public function render(Request $request): Response
    {
        return response([
            'message' => $this->getMessage(),
            'data'    => $this->withData(),
        ], 400);
    }

    public function withData()
    {
        return null;
    }
}
