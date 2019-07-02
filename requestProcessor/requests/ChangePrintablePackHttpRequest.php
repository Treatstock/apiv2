<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 11:26
 */
namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\ChangePrintablePackRequest;

/**
 * Class ChangePrintablePackHttpRequest
 *
 * @property ChangePrintablePackRequest $model
 * @package treatstock\api\v2\requestProcessor\requests
 */
class ChangePrintablePackHttpRequest extends BaseRequest
{

    public function getMethod()
    {
        return BaseRequest::HTTP_METHOD_PUT;
    }

    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl.'printable-packs/'.$this->model->printablePackId.'?private-key=' . $this->privateKey;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        $post = [];
        if ($this->model->qty) {
            $post['qty'] = json_decode(json_encode($this->model->qty), true);
        }
        if ($this->model->textureInfo) {
            $post['modelTextureInfo'] = json_decode(json_encode($this->model->textureInfo), true);
        }
        if ($this->model->scaleUnit) {
            $post['scaleUnit'] = $this->model->scaleUnit;
        }
        $post = $this->cleanEmptyParams($post);
        $post = http_build_query($post);
        return   $post;
    }
}