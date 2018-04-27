<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 11:35
 */

namespace treatstock\api\v2\models\requests;

class GetPrintablePackStatusRequest
{
    /**
     * This is id from create printable pack answer
     *
     * @var  int
     */
    public $printablePackId;
}