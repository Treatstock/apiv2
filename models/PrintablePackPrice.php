<?php

namespace treatstock\api\v2\models;

class PrintablePackPrice
{
    /**
     * Material group code.
     * Example: PLA
     *
     * @var string
     */
    public $materialGroup;

    /**
     * Color code.
     * Example: White
     *
     * @var string
     */
    public $color;

    /**
     * Price for printing
     *
     * @var float
     */
    public $price;
}