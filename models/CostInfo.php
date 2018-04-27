<?php

namespace treatstock\api\v2\models;

class CostInfo
{
    /**
     * Printable pack id
     * Example: 30
     *
     * @var int
     */
    public $printablePackId;

    /**
     * Material group code
     * Example: Resin
     *
     * @var string
     */
    public $materialGroup;

    /**
     * Printing printer title
     * Example: US PS: Ditto-pro
     *
     * @var string
     */
    public $printer;

    /**
     * Printing color code
     * Example: White
     *
     * @var string
     */
    public $color;

    /**
     * Printing price in USD
     * Example: 2.53
     *
     * @var float
     */
    public $price;

    /**
     * Url for printing in this color
     * Example: https://www.treatstock.com/model3d/preload-printable-pack?packPublicToken=0964bab-ad2a5db-34549ae&printerMaterialGroupId=6&printerColorId=90
     *
     * @var string
     */
    public $url;
}