<?php

namespace spec\Todo\Models;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Task');
    }

    public function it_belongs_to_one_user()
    {
        $this->user()->shouldDefineRelationship('belongsTo', 'User');
    }

    public function it_has_many_tags()
    {
        $this->tags()->shouldDefineRelationship('hasMany', 'Tag');
    }

    public function it_has_many_comments()
    {
        $this->comments()->shouldDefineRelationship('hasMany', 'Comment');
    }

}
