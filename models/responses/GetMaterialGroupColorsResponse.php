<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\MaterialGroupColor;
use treatstock\api\v2\models\ModelValidatorInterface;

class GetMaterialGroupColorsResponse implements ModelValidatorInterface
{
    /**
     * Printing cost info
     *
     * @var MaterialGroupColor[]
     */
    public $materialGroupColors = [];

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}