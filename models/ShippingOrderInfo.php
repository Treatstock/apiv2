<?php
namespace treatstock\api\v2\models;

class ShippingOrderInfo
{
    /**
     * Carrier via treatstock or by print service
     *
     * @var string
     */
    public $carrier;

    /**
     * Tracking number
     *
     * @var string
     */
    public $trackingNumber;

    /**
     * Tracking shipper
     *
     * @var string
     */
    public $trackingShipper;
}