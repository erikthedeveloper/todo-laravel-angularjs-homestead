<?php

namespace Todo\Validation;

use Illuminate\Support\MessageBag;

/**
 * Class ValidationException
 * @package Todo\Validation
 */
class ValidationException extends \Exception {

    /**
     * @var string
     */
    protected $errors;

    /**
     * @param MessageBag | array $errors
     */
    public function __construct($errors)
    {
        if (is_array($errors)) $errors = new MessageBag($errors);
        $this->errors = $errors;
        $custom_message = $this->getCustomMessage();
        parent::__construct($custom_message);
    }

    /**
     * @return string
     */
    public function getCustomMessage()
    {
        return $this->getErrors()->toJson();
    }

    /**
     * Fetch validation errors

     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getErrorsArray()
    {
        return $this->errors->getMessages();
    }
}
 