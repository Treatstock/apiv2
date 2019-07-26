<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.07.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\SendMessageRequest;

/**
 * Class SendMessageHttpRequest
 *
 * @property SendMessageRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class SendMessageHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'msg-topic-messages/send-message?private-key=' . $this->privateKey;
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
            'orderId'      => $this->model->orderId,
            'messageText'  => $this->model->messageText
        ];
        $post = $this->cleanEmptyParams($post);
        $post = http_build_query($post);
        return $post;
    }
}