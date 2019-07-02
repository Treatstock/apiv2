<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\exceptions\InvalidAnswerModelException;
use treatstock\api\v2\models\Model3dPart;
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
        $this->loadAttributes([], $this->model, $data);
        foreach ($data['parts'] as $partInfo) {
            $this->initClassAttributes(Model3dPart::class, $model3dPart, $partInfo);

            $this->model->parts[]=$model3dPart;
        }
    }
}
