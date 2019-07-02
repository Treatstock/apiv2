<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 12:15
 */

namespace treatstock\api\v2\models\requests;

use treatstock\api\v2\models\ClientLocation;
use treatstock\api\v2\models\ModelTextureInfo;
use treatstock\api\v2\models\ShippingAddress;

class PlaceOrderRequest
{
    /**
     * This is id from create printable pack answer
     *
     * @var  int
     */
    public $printablePackId;

    /**
     * Printing provider id
     *
     * @var int
     */
    public $providerId;

    /**
     * Information about client
     *
     * @var ClientLocation
     */
    public $location;


    /**
     * Shipping delivery address
     *
     * @var ShippingAddress
     */
    public $shippingAddress;

    /**
     * Comment for printing company
     * Here you can describe your order
     *
     * @var string
     */
    public $comment;

    /**
     * Order will be places in this colors
     *
     * @var ModelTextureInfo
     */
    public $modelTextureInfo;
}