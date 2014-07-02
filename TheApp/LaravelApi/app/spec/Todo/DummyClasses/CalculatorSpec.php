<?php

namespace spec\Todo\DummyClasses;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\DummyClasses\Calculator');
    }

    function it_can_add_two_numbers()
    {
        $x   = 3;
        $y   = 10;
        $sum = $x + $y;
        $this->addTwoNumbers($x, $y)->shouldReturn($sum);
    }
}
