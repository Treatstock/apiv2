<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.06.19
 * Time: 13:57
 */

namespace treatstock\api\v2\requestProcessor\requests;

use treatstock\api\v2\models\requests\GetPrintablePackOffersRequest;
use treatstock\api\v2\models\requests\GetPrintablePackPricesRequest;

/**
 * Class GetPrintablePackOffersHttpRequest
 *
 * @package treatstock\apiv2\requests
 * @property GetPrintablePackOffersRequest $model
 */
class GetPrintablePackOffersHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl . 'printable-pack-offers/?printablePackId=' . $this->model->printablePackId
            . ($this->model->intlOnly ? '&intlOnly=1' : '')
            . '&private-key=' . $this->privateKey;
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