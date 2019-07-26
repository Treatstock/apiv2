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
 * Class SendMessageRequest
 *
 * @package treatstock\api\v2\models\requests
 */
class SendMessageRequest
{
    /**
     * Payed order id
     *
     * @var int
     */
    public $orderId;

    /**
     * Message text
     *
     * @var string
     */
    public $messageText;

}