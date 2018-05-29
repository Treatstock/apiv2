<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 15:25
 */

namespace treatstock\api\v2\models\requests;

use treatstock\api\v2\models\Location;

class GetPrintablePackCostsRequest
{
    /**
     * This is id from create printable pack answer
     *
     * @var  int
     */
    public $printablePackId;

    /**
     * You can specify client location
     *
     * @var Location
     */
    public $location;
}