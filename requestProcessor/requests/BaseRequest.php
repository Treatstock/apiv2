<?php

namespace treatstock\api\v2\requestProcessor\requests;

abstract class BaseRequest
{
    /**
     * You private api key
     *
     * @var string
     */
    public $privateKey;

    /**
     * Base model
     */
    public $model;

    /**
     * @var string
     */
    public $baseUrl;

    const HTTP_METHOD_PUT = 'PUT';


    public function __construct($privateKey, $model, $baseUrl)
    {
        $this->privateKey = $privateKey;
        $this->model = $model;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Form request url
     *
     * @return string
     */
    abstract public function getRequestUrl();


    /**
     * Form post params for request
     *
     * @return array
     */
    abstract public function getPostParams();

    public function getMethod()
    {
        return '';
    }

    /**
     * Don`t send empty params.
     *
     * @param $post
     * @return array
     */
    protected function cleanEmptyParams($post)
    {
        $returnValue = [];
        foreach ($post as $key => $value) {
            if ($value) {
                $returnValue[$key] = $value;
            }
        }
        return $returnValue;
    }
}