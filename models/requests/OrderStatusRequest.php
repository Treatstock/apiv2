<?php
namespace treatstock\api\v2\models\requests;

/**
 * Class OrderStatusRequest
 *
 * You can check your order status
 *
 * @package treatstock\api\v2\models\requests
 */
class OrderStatusRequest
{
    /**
     * This your order id.
     *
     * @var int
     */
    public $orderId;
}
