<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 10:35
 */

namespace treatstock\api\v2\models\requests;


use treatstock\api\v2\models\ModelTextureInfo;

/**
 * Class ChangePrintablePackRequest
 *
 * @package treatstock\api\v2\models\requests
 */
class ChangePrintablePackRequest
{

    const SCALE_UNIT_MM = 'mm';
    const SCALE_UNIT_CM = 'cm';
    const SCALE_UNIT_IN = 'in';

    /**
     * Printable pack string
     *
     * @var string
     */
    public $printablePackId;

    /**
     * You can set scale unit. Possible values: in, cm, mm
     *
     * @var string
     */
    public $scaleUnit;

    /**
     * You can set scale. Possible values: 1 - 100%, 2  - 200%, 0,5 - 50%
     *
     * @var float
     */
    public $scale;

    /**
     * @var ModelTextureInfo
     */
    public $textureInfo;

    /**
     * Array with count for each 3d model part.
     *
     * @var int[]
     */
    public $qty;

}