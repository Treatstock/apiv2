<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\MsgMessageFile;
use treatstock\api\v2\models\ModelValidatorInterface;

class SendMessageResponse implements ModelValidatorInterface
{
    const REASON_EMPTY_TEXT = 'empty_text';

    /**
     * Message id
     *
     * @var int
     */
    public $id;

    /**
     * Who sent the message
     *
     * @var string
     */
    public $userUid;

    /**
     * Who send the message
     *
     * @var string
     */
    public $userTitle;

    /**
     * Message created date UTC
     *
     * @var string
     */
    public $createdAt;

    /**
     * Message text
     *
     * @var string
     */
    public $text;

    /**
     * Message topic id
     *
     * @var int
     */
    public $topicId;

    /**
     * Files attached to message
     *
     * @var MsgMessageFile[]
     */
    public $files = [];

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        $errors = [];
        if (!$this->text) {
            $errors['text'] = self::REASON_EMPTY_TEXT;
        }
        return $errors;
    }
}