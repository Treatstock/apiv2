<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:23
 */

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;

class PayOrderResponse implements ModelValidatorInterface
{
    /**
     * Placed order id
     *
     * @var int
     */
    public $orderId;

    /**
     * Total price
     *
     * @var float
     */
    public $total;


    /**
     * Url to view order
     *
     * @var string
     */
    public $invoiceUuid;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}