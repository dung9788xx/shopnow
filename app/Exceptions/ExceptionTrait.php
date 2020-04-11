<?php


namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait
{

    public function abc($request, $exception)
    {

        if ($exception instanceof ModelNotFoundException) {

            return response()->json("Resource not found", 404);
        }

    }
}
