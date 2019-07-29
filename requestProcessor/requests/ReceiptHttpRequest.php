<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\ReceiptRequest;

/**
 * Class ReceiptHttpRequest
 *
 * @property ReceiptRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class ReceiptHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'receipt/download?private-key=' . $this->privateKey.'&orderId='.$this->model->orderId;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        return null;
    }
}
