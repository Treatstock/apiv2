<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\exceptions\InvalidAnswerModelException;
use treatstock\api\v2\models\responses\CreatePrintablePackResponse;

/**
 * Class CreatePrintablePackHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\response
 * @property CreatePrintablePackResponse $model
 */
class CreatePrintablePackHttpResponse extends BaseResponse
{

    public function getModelClass()
    {
        return CreatePrintablePackResponse::class;
    }


    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $attributes = [
            'id',
            'redir'
        ];
        $this->loadAttributes($attributes, $this->model, $data);
    }
}