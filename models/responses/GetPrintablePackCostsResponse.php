<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\CostInfo;
use treatstock\api\v2\models\ModelValidatorInterface;

/**
 * class ResponseCreatePrintablePack
 *
 * @package treatstock\api\v2
 */
class GetPrintablePackCostsResponse implements ModelValidatorInterface
{
    /**
     * Printing cost info
     *
     * @var CostInfo[]
     */
    public $costsInfo;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}