<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });

        // render error SQLSTATE[23000] in queryException
        $this->renderable(function (QueryException $e, $request) {
            if ($e->getCode() == 23000) {
                if (str_contains($e->getMessage(), 'foreign key constraint fails'))
                    $message = 'Cannot Delete Data With Children';
            }
            if ($request->expectsJson())
                return response()->json(['error' => $message], 422);

            return redirect()->back()->withInput()->with('error', $message);

        });
    }


}
