<?php

namespace treatstock\api\v2\models;

class MaterialGroupColor
{
    /**
     * Material group code
     *
     * @var string
     */
    public $code;

    /**
     * Multiline text description
     *
     * @var string
     */
    public $description;

    /**
     * @var Color[]
     */
    public $colors = [];

    /**
     * @var InfillInfo
     */
    public $infillInfo;
}