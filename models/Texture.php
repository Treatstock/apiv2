<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 10:45
 */

namespace treatstock\api\v2\models;

class Texture
{
    /**
     * Color code. Example: Green
     *
     * @var string
     */
    public $color;

    /**
     * Material group code. Example: PLA.
     *
     * @var string
     */
    public $materialGroup;


    /**
     * Material code.
     *   May be null: any material in group can be used.
     *   May be string, example: PLA. It will be only PLA. Not Wax PLA, not Steel PLA, etc...
     *
     * @var string
     */
    public $material;
}