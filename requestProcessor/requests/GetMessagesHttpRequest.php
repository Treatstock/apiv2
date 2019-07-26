<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.07.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\GetMessagesRequest;

/**
 * Class GetMessagesHttpRequest
 *
 * @property GetMessagesRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class GetMessagesHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'msg-topic-messages/?private-key=' . $this->privateKey.'&orderId='.$this->model->orderId;
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