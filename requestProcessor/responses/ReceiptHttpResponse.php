<?php
namespace treatstock\api\v2\requestProcessor\responses;

use treatstock\api\v2\exceptions\InvalidAnswerException;
use treatstock\api\v2\exceptions\InvalidAnswerModelException;
use treatstock\api\v2\models\responses\PayOrderResponse;
use treatstock\api\v2\models\responses\ReceiptResponse;

/**
 * Class ReceiptHttpResponse
 *
 * @package treatstock\api\v2\requestProcessor\responses
 * @property ReceiptResponse $model
 *
 */
class ReceiptHttpResponse extends BaseResponse
{
    public function getModelClass()
    {
        return ReceiptResponse::class;
    }

    /**
     * @param $data
     * @throws \ReflectionException
     */
    public function loadModel($data)
    {
        $this->model->receiptPdfContent = $data;
    }

    protected function checkForSuccess($httpData)
    {
        if (!is_string($httpData)) {
            parent::checkForSuccess($httpData);
        }
        if (strpos($httpData, '%PDF-')!==0) {
            throw new InvalidAnswerException('Invalid format. Not PDF.');
        }
    }
}
