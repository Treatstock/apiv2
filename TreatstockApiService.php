<?php

namespace treatstock\api\v2;

use treatstock\api\v2\models\requests\CreatePrintablePackRequest;
use treatstock\api\v2\models\requests\GetPrintablePackCostsRequest;
use treatstock\api\v2\models\requests\GetPrintablePackStatusRequest;
use treatstock\api\v2\models\responses\CreatePrintablePackResponse;
use treatstock\api\v2\models\responses\GetMaterialGroupColorsResponse;
use treatstock\api\v2\models\responses\GetPrintablePackCostsResponse;
use treatstock\api\v2\models\responses\GetPrintablePackStatusResponse;
use treatstock\api\v2\requestProcessor\RequestProcessor;
use treatstock\api\v2\requestProcessor\requests\CreatePrintablePackHttpRequest;
use treatstock\api\v2\requestProcessor\requests\GetMaterialGroupColorsHttpRequest;
use treatstock\api\v2\requestProcessor\requests\GetPrintablePackCostsHttpRequest;
use treatstock\api\v2\requestProcessor\requests\GetPrintablePackStatusHttpRequest;
use treatstock\api\v2\requestProcessor\responses\CreatePrintablePackHttpResponse;
use treatstock\api\v2\requestProcessor\responses\GetMaterialGroupColorsHttpResponse;
use treatstock\api\v2\requestProcessor\responses\GetPrintablePackCostsHttpResponse;
use treatstock\api\v2\requestProcessor\responses\GetPrintablePackStatusHttpResponse;


/**
 * Class TreatstockApiV2Controller
 *
 * @package treatstock\api\v2
 */
class TreatstockApiService
{
    /**
     * Api url
     *
     * @var string
     */
    public $apiUrl = '';

    /**
     * This is private key for access to treatstock api
     *
     * @var string
     */
    public $privateKey = '';

    /**
     * @var RequestProcessor
     */
    public $requestProcessor;

    /**
     * TreatstockApiV2Service constructor.
     *
     * @param string $privateKey
     * @param string $sitePath
     */
    public function __construct($privateKey, $sitePath = 'https://api.treatstock.com')
    {
        $this->apiUrl = $sitePath . '/api/v2/';
        $this->privateKey = $privateKey;
    }


    public function getRequestProcessor()
    {
        if (!$this->requestProcessor) {
            $this->requestProcessor = new RequestProcessor();
        }
        return $this->requestProcessor;
    }


    public function setDebugMode($isDebug)
    {
        $this->getRequestProcessor()->isDebug = $isDebug;
    }

    /**
     * @param CreatePrintablePackRequest $createPrintablePackRequest
     * @return CreatePrintablePackResponse
     * @throws \treatstock\api\v2\exceptions\InvalidAnswerException
     */
    public function createPrintablePack(CreatePrintablePackRequest $createPrintablePackRequest)
    {
        $httpRequest = new CreatePrintablePackHttpRequest($this->privateKey, $createPrintablePackRequest, $this->apiUrl);
        $response = $this->getRequestProcessor()->processRequest($httpRequest, CreatePrintablePackHttpResponse::class);
        return $response->model;
    }

    /**
     * @param GetPrintablePackStatusRequest $getPrintablePackRequest
     * @return GetPrintablePackStatusResponse
     * @throws exceptions\InvalidAnswerException
     */
    public function getPrintablePackStatus(GetPrintablePackStatusRequest $getPrintablePackRequest)
    {
        $httpRequest = new GetPrintablePackStatusHttpRequest($this->privateKey, $getPrintablePackRequest, $this->apiUrl);
        $response = $this->getRequestProcessor()->processRequest($httpRequest, GetPrintablePackStatusHttpResponse::class);
        return $response->model;
    }

    /**
     * @param GetPrintablePackCostsRequest $getPrintablePackRequest
     * @return GetPrintablePackCostsResponse
     * @throws exceptions\InvalidAnswerException
     */
    public function getPrintablePackCosts(GetPrintablePackCostsRequest $getPrintablePackRequest)
    {
        $httpRequest = new GetPrintablePackCostsHttpRequest($this->privateKey, $getPrintablePackRequest, $this->apiUrl);
        $response = $this->getRequestProcessor()->processRequest($httpRequest, GetPrintablePackCostsHttpResponse::class);
        return $response->model;
    }

    /**
     * @return GetMaterialGroupColorsResponse
     * @throws \treatstock\api\v2\exceptions\InvalidAnswerException
     */
    public function getMaterialGroupColors()
    {
        $httpRequest = new GetMaterialGroupColorsHttpRequest($this->privateKey, null, $this->apiUrl);
        $response = $this->getRequestProcessor()->processRequest($httpRequest, GetMaterialGroupColorsHttpResponse::class);
        return $response->model;
    }

}