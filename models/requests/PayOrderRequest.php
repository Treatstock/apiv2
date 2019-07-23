<?php

namespace treatstock\api\v2\models\requests;

/**
 * Class PayOrderRequest
 *
 * Now you can pay only by treatstock balance. By account bindided with your Api External System.
 *
 * @package treatstock\api\v2\models\requests
 */
class PayOrderRequest
{
    /**
     * This your pay order id.
     *
     * @var int
     */
    public $orderId;

    /**
     * This is protect from invalid sum
     *
     * @var float
     */
    public $total;
}