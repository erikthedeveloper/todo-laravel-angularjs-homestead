<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class TagSpec extends EloquentModelBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Tag');
    }

    public function it_belongs_to_many_tasks() {
    	$this->tasks()->shouldDefineRelationship('belongsToMany', 'Todo\Models\Task');
    }

}
