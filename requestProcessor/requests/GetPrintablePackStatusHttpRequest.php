<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\GetPrintablePackStatusRequest;

/**
 * Class GetPrintablePackStatusHttpRequest
 *
 * @property GetPrintablePackStatusRequest $model
 * @package treatstock\apiv2
 */
class GetPrintablePackStatusHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl.'printable-packs/' . $this->model->printablePackId . '?private-key=' . $this->privateKey;
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