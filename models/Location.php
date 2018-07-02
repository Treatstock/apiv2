<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 29.05.18
 * Time: 10:01
 */

namespace treatstock\api\v2\models;

class Location
{
    /**
     * Client ip, we will detect country by ip. It can be empty if you specify country directly.
     * Example: 83.69.106.68
     *
     * @var string
     */
    public $ip;

    /**
     * Counrty iso code
     * Example: US
     *
     * @var string
     */
    public $country;
}