<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\PayOrderRequest;

/**
 * Class PayOrderHttpRequest
 *
 * @property PayOrderRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class PayOrderHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'payment/pay?private-key=' . $this->privateKey;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        $post = [
            'orderId' => $this->model->orderId,
            'total'   => $this->model->total
        ];
        return $post;
    }
}
