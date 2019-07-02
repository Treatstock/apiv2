<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 14:05
 */

namespace treatstock\api\v2\models;

class Model3dPart
{
    /** @var string */
    public $uid;

    /**
     * Title for model3d part item
     *
     * @var string
     */
    public $name;

    /**
     * Quantity to be printed
     *
     * @var int
     */
    public $qty;

    /**
     * Md5 hash of file
     *
     * @var string
     */
    public $hash;

    /**
     * @var PartSize
     */
    public $size;

    /**
     * @var PartSize
     */
    public $originalSize;

    /**
     * Model3dpart weight in gramm
     *
     * @var float
     */
    public $weight;

    /**
     * @var Texture
     */
    public $texture;
}
