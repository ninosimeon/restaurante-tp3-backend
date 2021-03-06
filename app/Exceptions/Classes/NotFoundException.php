<?php

namespace App\Exceptions\Classes;


use Throwable;

class NotFoundException extends AbstractException
{

    public function __construct($message = null, Throwable $previous = null)
    {
        $message = (!is_null($message))? $message : trans('exception.not_found');
        parent::__construct($message, 404, $previous);
    }

}