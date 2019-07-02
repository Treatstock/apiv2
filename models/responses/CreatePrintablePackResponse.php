<?php

namespace treatstock\api\v2\models\responses;

use treatstock\api\v2\models\Model3dPart;
use treatstock\api\v2\models\ModelValidatorInterface;


/**
 * class CreatePrintablePackResponse
 *
 * @package treatstock\api\v2
 */
class CreatePrintablePackResponse implements ModelValidatorInterface
{
    /**
     * Printable pack id
     *
     * @var int
     */
    public $id;


    /**
     * Url for page with printing model.
     *
     * @var string
     */
    public $redir;


    /**
     * May be used to insert into iframe with custom settings.
     *
     * @var string
     */
    public $widgetUrl;

    /**
     * Ready to use iframe html code
     *
     * @var string
     */
    public $widgetHtml;


    /**
     * List of model3d parts info
     *
     * @var Model3dPart[]
     */
    public $parts;


    /**
     *
     */
    public function validateAndGetErrors()
    {
        $errors = [];

        if (($this->id) != ((int)$this->id)) {
            $errors['id'] = ModelValidatorInterface::REASON_NOT_INT;
        } elseif ($this->id < 1) {
            $errors['id'] = ModelValidatorInterface::REASON_NATURAL_POSITIVE;
        }
        if (!$this->redir) {
            $errors['redir'] = ModelValidatorInterface::REASON_EMPTY;
        }
        return $errors;
    }
}