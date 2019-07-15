<?php

namespace treatstock\api\v2\exceptions;

class UnSuccessException extends TreatstockException {
    /**
     * Errors list from Treatstock
     *
     * @var array
     */
    public $errors;

    public function __construct($message = '', $errors = [])
    {
        $this->errors = $errors;
        parent::__construct($message, 0, null);
    }
}