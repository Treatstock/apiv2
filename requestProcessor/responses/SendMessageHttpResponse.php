<?php
namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\models\MsgMessageFile;
use treatstock\api\v2\models\responses\SendMessageResponse;

/**
 * Class SendMessageHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 * @property SendMessageResponse $model
 */
class SendMessageHttpResponse extends BaseResponse
{

    public function getModelClass()
    {
        return SendMessageResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $this->loadAttributes([], $this->model, $data);
        if (array_key_exists('files', $data)) {
            foreach ($data['files'] as $fileInfo) {
                $messageFile = new MsgMessageFile();
                $this->loadAttributes([], $messageFile, $fileInfo);
                $this->model->files[] = $messageFile;
            }
        }
    }
}