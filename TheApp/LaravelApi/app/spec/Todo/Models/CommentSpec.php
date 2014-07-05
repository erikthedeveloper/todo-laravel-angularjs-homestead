<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class CommentSpec extends EloquentModelBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Comment');
    }

    public function it_belongs_to_one_user()
    {
        $this->user()->shouldDefineRelationship('belongsTo', 'Todo\Models\User');
    }
}
