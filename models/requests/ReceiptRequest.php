<?php

namespace treatstock\api\v2\models\requests;

/**
 * Class ReceiptRequest
 *
 * You can download receipt for any your order
 *
 * @package treatstock\api\v2\models\requests
 */
class ReceiptRequest
{
    /**
     * This your order id.
     *
     * @var int
     */
    public $orderId;
}
