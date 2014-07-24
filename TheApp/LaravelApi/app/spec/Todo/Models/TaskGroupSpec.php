<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class TaskGroupSpec extends EloquentModelBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\TaskGroup');
    }

    public function it_has_many_tasks() {
        $this->tasks()->shouldDefineRelationship('hasMany', 'Todo\Models\Task');
    }

}
