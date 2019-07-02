<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 10:41
 */

namespace treatstock\api\v2\models;

class ModelTextureInfo
{

    /**
     * Flag, is one material for all 3d model parts. If parts have different materials, it should be 0.
     *
     * @var int
     */
    public $isOneMaterialForKit = 1;

    /**
     * @var Texture
     */
    public $modelTexture;

    /**
     * If $isOneMaterialForKit is 0. Used this array with Textures for each 3d model part.
     *
     * @var Texture[]
     */
    public $partsMaterial;
}