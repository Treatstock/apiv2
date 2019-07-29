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

    /**
     * @param $url
     * @param $postParams
     * @param $result
     * @param $httpStatus
     * @param $err
     */
    protected function debugLog($url, $postParams, $result, $httpStatus, $err)
    {
        if (is_string($postParams)) {
            parse_str($postParams, $postParamsArray);
        } else {
            $postParamsArray = $postParams;
        }

        if (!$postParams) {
            echo "\nGet request URL: " . $url;
        } else {
            echo "\nPost request URL: " . $url;
            echo "\nPost params: \n";
            echo \treatstock\api\v2\helpers\FormattedJson::encode($postParamsArray);
        }
        echo "\nResponse:\n";
        $jsonDecoded = json_decode($result, true);
        if ($jsonDecoded) {
            // Answer is json
            echo \treatstock\api\v2\helpers\FormattedJson::encode($jsonDecoded);
        } else {
            // Not json, simple output
            echo $result;
        }
        echo "\nHttp code: " . $httpStatus;
        if ($err) {
            echo "\nHttp error: " . $err;
        }
        echo "\n";
        // Data for mysql insert
        /*
        $output = [
            'url' => $url,
            'post' =>  $postParamsArray,
            'answer' => $result,
            'httpCode' => $httpStatus,
            'httpError' => $err,
        ];*/
    }
}