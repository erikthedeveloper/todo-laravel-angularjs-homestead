<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class TagSpec extends EloquentModelBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Tag');
    }

    function it_has_many_tasks() {
    	$this->tasks()->shouldDefineRelationship('hasMany', 'Todo\Models\Task');
    }

    function it_belongs_to_one_user() {
    	$this->user()->shouldDefineRelationship('belongsTo', 'Todo\Models\User');
    }
}
