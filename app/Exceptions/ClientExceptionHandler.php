<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ClientExceptionHandler extends Exception
{
    //
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ClientExceptionHandler) {
            return response()->view('error', ['message' => $exception->getMessage()]);
        }

        return parent::render($request, $exception);
    }
}
