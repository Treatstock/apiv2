<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\responses\PayOrderResponse;

/**
 * Class PayOrderHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 */
class PayOrderHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return PayOrderResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $attributes = ['orderId', 'total', 'invoiceUuid'];
        $this->loadAttributes($attributes, $this->model, $data);
    }
}
