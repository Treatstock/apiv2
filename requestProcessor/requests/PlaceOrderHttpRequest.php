<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:07
 */

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\PlaceOrderRequest;

/**
 * Class PlaceOrderHttpRequest
 *
 * @property PlaceOrderRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class PlaceOrderHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'place-order/create?private-key=' . $this->privateKey;
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
            'printablePackId'  => $this->model->printablePackId,
            'providerId'       => $this->model->providerId,
            'comment'          => $this->model->comment,
            'location'         => json_decode(json_encode($this->model->location), true),
            'shippingAddress'  => json_decode(json_encode($this->model->shippingAddress), true),
            'modelTextureInfo' => json_decode(json_encode($this->model->modelTextureInfo), true),
        ];
        $post = $this->cleanEmptyParams($post);
        $post = http_build_query($post);
        return $post;
    }
}