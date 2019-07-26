<?php
namespace treatstock\api\v2\models;

class MsgMessage
{
    /**
     * Message id
     *
     * @var int
     */
    public $id;

    /**
     * Message sender uid
     *
     * @var string
     */
    public $userUid;

    /**
     * Message sender name
     *
     * @var string
     */
    public $userTitle;

    /**
     * Message creating date (UTC)
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
     * List of files attached to message
     *
     * @var MsgMessageFile[]
     */
    public $files;
}