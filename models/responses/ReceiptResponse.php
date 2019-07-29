<?php
namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\ModelValidatorInterface;

/**
 * Class ReceiptResponse
 *
 * @package treatstock\api\v2\models\responses
 */
class ReceiptResponse implements ModelValidatorInterface
{
    /**
     * This is raw pdf content
     *
     * @var string
     */
    public $receiptPdfContent;

    /**
     * @return array
     */
    public function validateAndGetErrors()
    {
        return [];
    }
}
