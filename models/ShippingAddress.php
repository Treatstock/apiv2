<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 26.06.19
 * Time: 16:25
 */
namespace treatstock\api\v2\models;

class ShippingAddress
{
    /**
     * Country iso code, example: US
     *
     * @var string
     */
    public $country;


    /**
     * Delivery zip code, example: 20003
     *
     * @var string
     */
    public $zip;

    /**
     * City, example: WASHINGTON
     *
     * @var string
     */
    public $city;

    /**
     * Us state, example: DC
     *
     * @var string
     */
    public $state;

    /**
     * Street, example: 727 C ST SE
     *
     * @var string
     */
    public $street;

    /**
     * Street2
     *
     * @var string
     */
    public $street2;

    /**
     * Contact person first name, example: Demos
     *
     * @var string
     */
    public $firstName;

    /**
     * Contact person last name, example: Amerigos
     *
     * @var string
     */
    public $lastName;
}