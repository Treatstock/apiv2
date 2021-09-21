<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\GetPrintablePackPricesRequest;

/**
 * Class GetPrintablePackPricesHttpRequest
 *
 * @package treatstock\apiv2\requests
 * @property GetPrintablePackPricesRequest $model
 */
class GetPrintablePackPricesHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl.'printable-pack-costs?printablePackId=' . $this->model->printablePackId . '&private-key=' . $this->privateKey;
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