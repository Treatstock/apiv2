<?php
namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\MsgMessage;
use treatstock\api\v2\models\MsgMessageFile;
use treatstock\api\v2\models\ModelValidatorInterface;

class GetMessagesResponse implements ModelValidatorInterface
{
    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        $errors = [];
        return $errors;
    }
}