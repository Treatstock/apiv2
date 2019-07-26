<?php

namespace treatstock\api\v2\models;

class MsgTopic
{
    /**
     * Message id
     *
     * @var int
     */
    public $id;


    /**
     * Topic creator user uid
     *
     * @var string
     */
    public $creatorUid;

    /**
     * Topic creator name
     *
     * @var string
     */
    public $creatorTitle;

    /**
     * Topic creation date (UTC)
     *
     * @var string
     */
    public $createdAt;

    /**
     * Topic theme title
     *
     * @var string
     */
    public $title;

    /**
     * Last message date (UTC)
     *
     * @var string
     */
    public $lastMessageTime;

    /**
     * Topic binded with order id
     *
     * @var int
     */
    public $orderId;

    /**
     * Messages list
     *
     * @var MsgMessage[]
     */
    public $messages = [];
}