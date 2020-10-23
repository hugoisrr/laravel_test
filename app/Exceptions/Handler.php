<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Response as HttpResponse;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenBlacklistedException) {
            return response(['error' => 'Token cannot be used, get a new token'], HttpResponse::HTTP_BAD_REQUEST);
        } else if ($exception instanceof TokenInvalidException) {
            return response(['error' => 'Token is invalid'], HttpResponse::HTTP_BAD_REQUEST);
        } else if ($exception instanceof TokenExpiredException) {
            return response(['error' => 'Token is expired'], HttpResponse::HTTP_BAD_REQUEST);
        } else if ($exception instanceof JWTException) {
            return response(['error' => 'Token is not provided'], HttpResponse::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $exception);
    }
}
