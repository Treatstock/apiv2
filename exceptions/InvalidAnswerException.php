<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 10:19
 */

namespace treatstock\api\v2\exceptions;

use Throwable;

class InvalidAnswerException extends \Exception
{
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