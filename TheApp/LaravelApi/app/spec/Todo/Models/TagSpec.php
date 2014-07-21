<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

/**
 * Class TagSpec
 * @package spec\Todo\Models
 */
class TagSpec extends EloquentModelBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Tag');
    }

    /**
     *  A Tag can belong to multiple Tasks
     */
    public function it_belongs_to_many_tasks()
    {
        $this->tasks()->shouldDefineRelationship('belongsToMany', 'Todo\Models\Task');
    }

}
