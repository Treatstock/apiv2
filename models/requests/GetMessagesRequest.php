<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.07.19
 * Time: 10:35
 */

namespace treatstock\api\v2\models\requests;

use treatstock\api\v2\models\ModelTextureInfo;

/**
 * Class GetMessagesRequest
 *
 * @package treatstock\api\v2\models\requests
 */
class GetMessagesRequest
{
    /**
     * Payed order id
     *
     * @var int
     */
    public $orderId;
}