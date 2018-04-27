<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\exceptions\InvalidAnswerException;
use treatstock\api\v2\exceptions\InvalidAnswerModelException;
use treatstock\api\v2\models\ModelReflectionService;
use treatstock\api\v2\models\ModelValidatorInterface;

abstract class BaseResponse
{
    /**
     */
    public $model;

    /**
     * @var ModelReflectionService
     */
    public $modelReflectionService;

    /**
     * BaseResponse constructor.
     *
     * @param $httpData
     * @throws InvalidAnswerModelException
     * @throws InvalidAnswerException
     */
    public function __construct($httpData)
    {
        $modelClass = $this->getModelClass();
        $this->model = new $modelClass();
        $this->checkForSuccess($httpData);
        $this->loadModel($httpData);
        if ($errors = $this->model->validateAndGetErrors()) {
            throw new InvalidAnswerModelException($this->model, $errors);
        }
    }

    abstract public function getModelClass();

    abstract public function loadModel($data);


    /**
     * @param $httpData
     * @throws InvalidAnswerException
     */
    protected function checkForSuccess($httpData)
    {
        if (array_key_exists('success', $httpData) && (!$httpData['success'])) {
            throw new InvalidAnswerException(json_encode($httpData['errors']));
        }
    }

    /**
     * @return ModelReflectionService
     */
    public function getModelReflectionService()
    {
        if (!$this->modelReflectionService) {
            $this->modelReflectionService = ModelReflectionService::getInstance();
        }
        return $this->modelReflectionService;
    }

    /**
     * @param array $attributes
     * @param $model
     * @param array $data
     * @throws \ReflectionException
     */
    protected function loadAttributes($attributes, $model, $data)
    {
        foreach ($attributes as $attributeDataName => $attributeName) {
            if (((int)$attributeDataName) === $attributeDataName) {
                // is int index
                $attributeDataName = $attributeName;
            }

            $value = $data[$attributeDataName];
            $valueFormatted = $this->getModelReflectionService()->formatAttributeValue($model, $attributeName, $value);
            $model->$attributeName = $valueFormatted;
        }
    }
}