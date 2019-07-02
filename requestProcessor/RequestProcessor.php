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
    public $isDebug = 0;

    /**
     * @param BaseRequest $httpRequest
     * @param $httpResponseClass
     * @return BaseResponse
     * @throws InvalidAnswerException
     */
    public function processRequest(BaseRequest $httpRequest, $httpResponseClass)
    {
        $httpData = $this->processHttpRequest($httpRequest->getRequestUrl(), $httpRequest->getPostParams(), $httpRequest->getMethod());
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
     * @param string $method
     * @return mixed
     */
    protected function processHttpRequest($url, $postParams, $method)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

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

    protected function debugWrite($params)
    {
        echo \treatstock\api\v2\helpers\FormattedJson::encode($params);
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
        $output = [
            'URL' => $url,
            'Post' =>  $postParams,
            'Answer' => $result,
            'HttpCode' => $httpStatus,
            'HttpError' => $err,
        ];
        $this->debugWrite($output);
    }
}