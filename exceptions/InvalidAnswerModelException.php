<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 10:49
 */

namespace treatstock\api\v2\exceptions;

use Throwable;

class InvalidAnswerModelException extends TreatstockException
{
    /** @var object */
    public $model;

    /** @var array */
    public $modelErrors;

    /**
     * InvalidAnswerModelException constructor.
     *
     * @param $model
     * @param $modelErrors
     */
    public function __construct($model, $modelErrors)
    {
        $this->model = $model;
        $this->modelErrors = $modelErrors;
        $message = get_class($model) . ' Errors:' . json_encode($modelErrors);
        parent::__construct($message);
    }
}