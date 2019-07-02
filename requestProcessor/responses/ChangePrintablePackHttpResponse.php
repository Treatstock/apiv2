<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 11:26
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\responses\SuccessFlagResponse;

/**
 * Class ChangePrintablePackHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 */
class ChangePrintablePackHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return SuccessFlagResponse::class;
    }


    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {

    }
}