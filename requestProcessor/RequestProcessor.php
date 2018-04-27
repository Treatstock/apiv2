<?php
namespace treatstock\api\v2\requestProcessor;

use treatstock\api\v2\exceptions\InvalidAnswerException;
use treatstock\api\v2\requestProcessor\requests\BaseRequest;
use treatstock\api\v2\requestProcessor\responses\BaseResponse;

class RequestProcessor
{
    /**
     * @var bool
     */
    public $isDebug;

    /**
     * @param BaseRequest $httpRequest
     * @param $httpResponseClass
     * @return BaseResponse
     * @throws InvalidAnswerException
     */
    public function processRequest(BaseRequest $httpRequest, $httpResponseClass)
    {
        $httpData = $this->processHttpRequest($httpRequest->getRequestUrl(), $httpRequest->getPostParams());
        if (!$httpData) {
            throw new InvalidAnswerException('Empty treatstock api answer');
        }
        $httpJson = json_decode($httpData, true);
        if (!$httpData) {
            throw new InvalidAnswerException('Invalid json api answer');
        }

        /** @var BaseResponse $response */
        return new $httpResponseClass($httpJson);
    }


    /**
     * @param string $url
     * @param array $postParams
     * @return mixed
     */
    protected function processHttpRequest($url, $postParams)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($postParams !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
        }

        $result = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = '';
        if ($httpStatus !== 200) {
            $err = curl_error($ch);
        }
        curl_close($ch);
        if ($this->isDebug) {
            $this->debugLog($url, $postParams, $result, $httpStatus, $err);
        }
        return $result | $err;
    }


    /**
     * @param $url
     * @param $postParams
     * @param $result
     * @param $httpStatus
     * @param $err
     */
    protected function debugLog($url, $postParams, $result, $httpStatus, $err)
    {
        echo "\nURL: '" . $url . "'";
        echo "\nPost params: " . json_encode($postParams);
        echo "\nAnswer: '" . $result . "'";
        echo "\nHttp code: '" . $httpStatus . "'";
        echo "\nHttp error: '" . $err . "'";
        echo "\n";
    }
}