<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:23
 */

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;
use treatstock\api\v2\models\ValidatedAddress;

class PlaceOrderResponse implements ModelValidatorInterface
{
    const REASON_INVALID_PRICE = 'Invalid total price';

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
    public $url;

    /**
     * Placing orders by specified address is unavailable. If validated Address is correct, please use it to try to create order again.
     *
     * @var ValidatedAddress
     */
    public $validatedAddress;


    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        $errors = [];
        if ($this->total <= 0.01 && !$this->validatedAddress) {
            $errors['total'] = self::REASON_INVALID_PRICE;
        }
        return $errors;
    }
}