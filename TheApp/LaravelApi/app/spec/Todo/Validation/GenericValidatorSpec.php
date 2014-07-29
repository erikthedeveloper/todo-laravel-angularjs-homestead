<?php

namespace spec\Todo\Validation;

use App;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

/**
 * Class GenericValidatorSpec
 * @package spec\Todo\Validation
 */
class GenericValidatorSpec extends LaravelObjectBehavior
{

    public function let()
    {
        $validator = App::make('Illuminate\Validation\Factory');
        $this->beConstructedWith($validator);
    }

    /**
     * It returns true when validation is successful
     */
    public function it_returns_true_when_validation_is_successful()
    {
        $data  = ['first_name' => 'Joseph'];
        $rules = ['first_name' => ['required']];
        $this->validate($data, $rules)->shouldReturn(true);
    }

    /**
     * It throws validation exception when validation fails
     */
    public function it_throws_validation_exception_when_validation_fails()
    {
        $data  = ['first_name' => ''];
        $rules = ['first_name' => ['required']];
        $this->shouldThrow('Todo\Validation\ValidationException')->during('validate', [$data, $rules]);
    }

    /**
     * It allows custom messages to be defined per rule
     */
    public function it_allows_custom_messages_to_be_defined_per_rule()
    {
        $data = ['first_name' => ''];
        $rules = ['first_name' => ['required']];
        $custom_message = 'FooBar this is a custom message!';
        $messages = ['first_name.required' => $custom_message];
        $this->shouldThrow('Todo\Validation\ValidationException')->during('validate', [$data, $rules, $messages]);
    }
}
