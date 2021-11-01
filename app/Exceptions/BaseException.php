<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use App\Utils\Result;
use Exception;
use Illuminate\Support\Facades\Log;

class BaseException extends Exception
{
    use ApiResponser;

    protected $errors = [];
    protected $message = '';
    protected $code;

    public function __construct($code = Result::OK, $message = null, $errors = [])
    {
        $this->code = $code;
        $this->message = $message ?: Result::$resultMessage[$code];
        $this->errors = $errors;

        parent::__construct($message, $code);
    }

    public function render($request)
    {
        return $this->errorResponse($this->code, $this->message, $this->errors);
    }

    public function report()
    {
        Log::emergency($this->message);
    }
}
