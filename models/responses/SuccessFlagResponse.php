<?php
/**
 * Created by PhpStorm.
 * User: analitic
 * Date: 24.06.19
 * Time: 10:56
 */

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;

/**
 * Class SuccessFlagResponse
 *
 * Have not attributes, only success operation flag
 *
 * @package treatstock\api\v2\models\responses
 */
class SuccessFlagResponse implements ModelValidatorInterface
{
    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}