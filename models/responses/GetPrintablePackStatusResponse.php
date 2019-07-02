<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\Model3dPart;
use treatstock\api\v2\models\ModelValidatorInterface;
use treatstock\api\v2\models\PartSize;
use treatstock\api\v2\models\PrintablePackPrice;


class GetPrintablePackStatusResponse implements ModelValidatorInterface
{
    /**
     * Printable pack id
     *
     * @var int
     */
    public $id;

    /**
     * Model id
     *
     * @var int
     */
    public $model3dId;

    /**
     * Create date
     *
     * @var string
     */
    public $createdAt;


    /**
     * Model price
     *
     * @var float
     */
    public $modelPrice;

    /**
     * Model price info
     *
     * @var PrintablePackPrice
     */
    public $calculatedMinPrice;

    /**
     * Model3d size unit
     * Example: mm
     *
     * @var string
     */
    public $scaleUnit;

    /**
     * @var PartSize
     */
    public $largestPartSize;

    /**
     * @var Model3dPart[]
     */
    public $parts;

    /**
     * If price isn`t calculated. Contains reason.
     * See constants EMPTY_REASON_NOT_CALCULATED_YET, EMPTY_REASON_CLIENT_LOCATION_NOT_SET, etc...
     *
     * @var string
     */
    public $calculatedMinPriceEmptyReason;

    const EMPTY_REASON_NOT_CALCULATED_YET      = 'not_calculated_yet';          // Please retry api request, price is calculating now
    const EMPTY_REASON_CLIENT_LOCATION_NOT_SET = 'client_location_not_set';     // Price can`t be calculated, if client location wasn`t setted.
    const EMPTY_REASON_PRINTING_IMPOSSIBLE     = 'printing_impossible';         // Printing isn`t possible. It may be expired (1 day), need to create new Printable pack.

    public function validateAndGetErrors()
    {
        return [];
    }
}