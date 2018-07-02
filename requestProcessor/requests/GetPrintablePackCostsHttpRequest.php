<?php

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\GetPrintablePackCostsRequest;

/**
 * Class GetPrintablePackCostsHttpRequest
 *
 * @package treatstock\apiv2\requests
 * @property GetPrintablePackCostsRequest $model
 */
class GetPrintablePackCostsHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        $url = $this->baseUrl . 'printable-pack-costs/?printablePackId=' . $this->model->printablePackId . '&private-key=' . $this->privateKey;
        if ($this->model->printerMaterialGroup) {
            $url .= '&printerMaterialGroup=' . $this->model->printerMaterialGroup;
        }
        if ($this->model->printerColor) {
            $url .= '&printerColor=' . $this->model->printerColor;
        }

        if ($this->model->location) {
            if ($this->model->location->country) {
                $url .= '&location[country]=' . $this->model->location->country;
            } elseif ($this->model->location->ip) {
                $url .= '&location[ip]=' . $this->model->location->ip;
            } else {
                throw new \InvalidArgumentException('You should specify country or ip location');
            }
        }
        return $url;
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