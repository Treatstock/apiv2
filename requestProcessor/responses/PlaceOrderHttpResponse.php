<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\responses\PlaceOrderResponse;

class PlaceOrderHttpResponse extends BaseResponse
{

    public function getModelClass()
    {
        return PlaceOrderResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $attributes = ['orderId', 'total', 'url'];
        $this->loadAttributes($attributes, $this->model, $data);
    }
}
