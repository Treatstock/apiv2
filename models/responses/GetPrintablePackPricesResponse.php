<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\PriceInfo;
use treatstock\api\v2\models\ModelValidatorInterface;

/**
 * class ResponseCreatePrintablePack
 *
 * @package treatstock\api\v2
 */
class GetPrintablePackPricesResponse implements ModelValidatorInterface
{
    /**
     * Printing price info
     *
     * @var PriceInfo[]
     */
    public $pricesInfo;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}