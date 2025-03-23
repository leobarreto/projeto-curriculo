<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException; // Adicione esta linha
use Throwable;

class Handler extends ExceptionHandler
{
    protected function invalid($request, ValidationException $exception)
    {
        return redirect($exception->redirectTo ?? url()->previous())
            ->withInput($request->except('password', 'password_confirmation'))
            ->withErrors($exception->errors(), $exception->errorBag);
    }
}
