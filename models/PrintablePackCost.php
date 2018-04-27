<?php

namespace treatstock\api\v2\models;

class PrintablePackCost
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
     * Cost for printing
     *
     * @var float
     */
    public $cost;
}