<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class UserSpec extends EloquentModelBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\User');
    }

    function it_has_many_tasks() {
    	$this->tasks()->shouldDefineRelationship('hasMany', 'Todo\Models\Task');
    }

    function it_has_many_tags() {
    	$this->tags()->shouldDefineRelationship('hasMany', 'Todo\Models\Tag');
    }

    function it_has_many_comments() {
    	$this->comments()->shouldDefineRelationship('hasMany', 'Todo\Models\Comment');
    }
}
