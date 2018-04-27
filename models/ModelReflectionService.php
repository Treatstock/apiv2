<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 14:38
 */

namespace treatstock\api\v2\models;

use ReflectionProperty;

class ModelReflectionService
{

    /**
     * @var ModelReflectionService
     */
    protected static $_instance;

    /**
     * @var array
     */
    protected static $attributeTypeCache = [];

    /**
     * ModelReflectionService constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return ModelReflectionService
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * @param $model
     * @param $attributeName
     * @return string
     * @throws \ReflectionException
     */
    protected function getAttributeType($model, $attributeName)
    {
        $modelClass = get_class($model);
        if (array_key_exists($modelClass, self::$attributeTypeCache) && array_key_exists($attributeName, self::$attributeTypeCache[$modelClass])) {
            return self::$attributeTypeCache[$modelClass][$attributeName];
        }
        $reflection = new ReflectionProperty($modelClass, $attributeName);
        $doc = $reflection->getDocComment();
        if (preg_match('/@var\s+([^\s]+)/', $doc, $matches)) {
            list(, $type) = $matches;
        } else {
            $type = null;
        }
        self::$attributeTypeCache[$modelClass][$attributeName] = $type;
        return $type;
    }

    /**
     * @param $model
     * @param $attributeName
     * @param $value
     * @return int|string
     * @throws \ReflectionException
     */
    public function formatAttributeValue($model, $attributeName, $value)
    {
        $attributeType = $this->getAttributeType($model, $attributeName);
        switch ($attributeType) {
            case 'string':
                return (string)$value;
            case 'int':
                return (int)$value;
                break;
            case 'float':
                return (float)$value;
        }
        return $value;
    }
}