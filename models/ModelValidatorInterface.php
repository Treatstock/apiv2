<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 27.04.18
 * Time: 10:52
 */
namespace treatstock\api\v2\models;

interface ModelValidatorInterface {
    /**
     * @return array
     */
    public function validateAndGetErrors();

    const REASON_EMPTY = 'Should not be empty';

    const REASON_NOT_INT = 'It is not int';

    const REASON_NOT_ARRAY = 'It is not array';

    const REASON_NATURAL_POSITIVE = 'Should be positive natural';
}