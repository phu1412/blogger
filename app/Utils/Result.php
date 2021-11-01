<?php

namespace App\Utils;

class Result
{
    const OK = 0001;
    const ERROR = 0002;
    const INVALID_PARAMETERS = 0003;
    const UNAUTHORIZED = 0004;

    public static $resultMessage = [
        self::OK => 'Ok',
        self::ERROR => 'Error',
        self::INVALID_PARAMETERS => 'Invalid paramters.',
        self::UNAUTHORIZED => 'No authorization.',
    ];
}
