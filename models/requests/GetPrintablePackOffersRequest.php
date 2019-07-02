<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 15:56
 */

namespace treatstock\api\v2\models\requests;

/**
 * Instead of printable pack prices request, return offer for current printable pack state
 *
 * Class GetPrintablePackOffersRequest
 */
class GetPrintablePackOffersRequest
{
    /**
     * This is id from create printable pack answer
     *
     * @var  int
     */
    public $printablePackId;

    /**
     * Flag get only international printers
     *
     * @var int
     */
    public $intlOnly = 0;
}