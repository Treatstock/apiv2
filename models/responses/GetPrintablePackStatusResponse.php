<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;
use treatstock\api\v2\models\PrintablePackCost;


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
     * Model cost
     *
     * @var float
     */
    public $affiliatePrice;

    /**
     * Model cost currency
     *
     * @var string
     */
    public $affiliateCurrency;

    /**
     * Model cost info
     *
     * @var PrintablePackCost
     */
    public $calculatedMinCost;


    /**
     * If cost isn`t calculated. Contains reason.
     * See constants EMPTY_REASON_NOT_CALCULATED_YET, EMPTY_REASON_CLIENT_LOCATION_NOT_SET, etc...
     *
     * @var string
     */
    public $calculatedMinCostEmptyReason;

    const EMPTY_REASON_NOT_CALCULATED_YET      = 'not_calculated_yet';           // Please retry api request, cost is calculating now
    const EMPTY_REASON_CLIENT_LOCATION_NOT_SET = 'client_location_not_set'; // Cost can`t be calculated, if client location wasn`t setted.
    const EMPTY_REASON_PRINTING_IMPOSSIBLE     = 'printing_impossible';         // Printing isn`t possible. It may be expired (1 day), need to create new Printable pack.

    public function validateAndGetErrors()
    {
        return [];
    }
}