<?php

namespace treatstock\api\v2\models;

class Color
{
    /**
     * Color code
     * Example: Gray
     *
     * @var string
     */
    public $code;

    /**
     * RGB color format
     * Example: 190,190,190
     *
     * @var string
     */
    public $rgb;
}