<?php

namespace treatstock\api\v2\requestProcessor\requests;


/**
 * Class RequestGetMaterialGroupColors
 *
 * @package treatstock\apiv2\requests
 */
class GetMaterialGroupColorsHttpRequest extends BaseRequest
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->baseUrl.'material-group-colors/?private-key=' . $this->privateKey;
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