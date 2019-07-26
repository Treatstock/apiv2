<?php

namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\MsgMessage;
use treatstock\api\v2\models\MsgMessageFile;
use treatstock\api\v2\models\MsgTopic;
use treatstock\api\v2\models\responses\GetMessagesResponse;
use treatstock\api\v2\models\responses\SendMessageResponse;

/**
 * Class GetMessagesHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 * @property SendMessageResponse $model
 */
class GetMessagesHttpResponse extends BaseResponse
{

    public function getModelClass()
    {
        return GetMessagesResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        foreach ($data as $topicInfo) {
            $topic = new MsgTopic();
            $this->loadAttributes([], $topic, $topicInfo);
            foreach ($topicInfo['messages'] as $messageInfo) {
                $message = new MsgMessage();
                $messageInfo['topicId'] = $topic->id;
                $this->loadAttributes([], $message, $messageInfo);
                foreach ($messageInfo['files'] as $fileInfo) {
                    $messageFile = new MsgMessageFile();
                    $this->loadAttributes([], $messageFile, $fileInfo);
                    $message->files[] = $messageFile;
                }
                $topic->messages[] = $message;
            }
            $this->model->topics[] = $topic;
        }
    }
}