<?php
namespace treatstock\api\v2\models;

class ValidatedAddress
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
}