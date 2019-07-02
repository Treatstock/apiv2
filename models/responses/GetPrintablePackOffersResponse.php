<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 16:05
 */

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelTextureInfo;
use treatstock\api\v2\models\ModelValidatorInterface;
use treatstock\api\v2\models\PrintOffer;

class GetPrintablePackOffersResponse implements ModelValidatorInterface
{
    /**
     * @var ModelTextureInfo
     */
    public $modelTextureInfo;

    /** @var PrintOffer[] */
    public $offersList;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        $errors = [];
        if (!is_array($this->offersList)) {
            $errors['offersList'] = ModelValidatorInterface::REASON_NOT_ARRAY;
        }
        return $errors;
    }
}