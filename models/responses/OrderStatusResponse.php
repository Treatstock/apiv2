<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 19:23
 */

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;

class OrderStatusResponse implements ModelValidatorInterface
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
    public $url;

    /**
     * Order state
     *  Possible values: processing, closed, canceled, completed
     *
     * @var string
     */
    public $orderState;

    /**
     * Payment state
     *  States like: https://developers.braintreepayments.com/reference/general/statuses
     *
     * @var string
     */
    public $paymentState;

    /**
     * Attempt state
     * Base values:
     *   new        - placed,
     *   accepted   - printing service accepted order,
     *   printing   - printing service working,
     *   printed    - printing done,
     *   sent       - sended  to client,
     *   canceled   - canceled,
     *   received   - received by client
     *
     * @var string
     */
    public $attemptState;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}