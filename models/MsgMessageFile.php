<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.07.19
 * Time: 14:05
 */

namespace treatstock\api\v2\models;

class MsgMessageFile
{
    /**
     * File name
     *
     * @var string
     */
    public $name;

    /**
     * Path for download file
     *
     * @var string
     */
    public $url;
}