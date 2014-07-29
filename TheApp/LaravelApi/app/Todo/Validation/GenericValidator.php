<?php

namespace Todo\Validation;

use Illuminate\Validation\Factory;

/**
 * Class GenericValidator
 * @package Todo\Validation
 */
class GenericValidator {

    /**
     * @var Factory
     */
    protected $validator;

    /**
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return bool
     * @throws ValidationException
     */
    public function validate(array $data, array $rules, $messages = [])
    {
        $validation = $this->validator->make($data, $rules, $messages);
        if ($validation->fails()) throw new ValidationException($validation->messages());

        return true;
    }


}
