<?php

namespace treatstock\api\v2\models\requests;

/**
 * Class CreatePrintablePackRequest
 *
 * @package treatstock\api\v2\requests
 */
class CreatePrintablePackRequest
{
    /**
     * Model file paths. You can set one or several paths on local disk.
     * You can upload
     *
     * @var array
     */
    public $filePaths = [];

    /**
     * Also you can set model file URLs. Treatstock will download it and create a printable pack.
     *
     * @var array
     */
    public $fileUrls = [];


    /**
     * OPTIONAL ATTRIBUTES
     */

    /**
     * Model price.
     *
     * @var int
     */
    public $affiliatePrice = 0;

    /**
     * Model price currency. Default: USD
     *
     * @var string
     */
    public $affiliateCurrency = '';

    /**
     * Model title. Single-line text. Max length 45 characters.
     * Example: Katana Mask
     *
     * @var string
     */
    public $title = '';

    /**
     * Print instructions for 3D printing service. Multi-line text.
     * Example: This model should be printed horizontally.
     *
     * @var string
     */
    public $printInstructions = '';


    /**
     * Model text description for client. Multi-line text.
     * Example: The mask was designed after Katana/Tatsu Yamashiro.
     *
     * @var string
     */
    public $description = '';

    /**
     * Client IP. With client's IP, Treatstock can detect the client's location to display appropriate manufacturers.
     * Example: 83.69.106.68
     *
     * @var string
     */
    public $locationIp = '';

    /**
     * Client county location. Using iso code: https://en.wikipedia.org/wiki/ISO_3166-1
     * Example: US
     *
     * @var string
     */
    public $locationCountryIso = '';


    /**
     * Model format Computer aided design (CAD), Computer-aided manufacturing (CAM). Default CAD.
     * https://en.wikipedia.org/wiki/Computer-aided_design
     * https://en.wikipedia.org/wiki/Computer-aided_manufacturing
     * Example: CAM
     *
     * @var string
     */
    public $model3dCae = '';
}