<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\responses\OrderStatusResponse;

/**
 * Class OrderStatusHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 * @property OrderStatusResponse $model
 */
class OrderStatusHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return OrderStatusResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $this->loadAttributes(null, $this->model, $data);
    }
}
