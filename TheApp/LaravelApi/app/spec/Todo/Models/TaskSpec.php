<?php

namespace spec\Todo\Models;

use PhpSpec\Laravel\EloquentModelBehavior;

class TaskSpec extends EloquentModelBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Models\Task');
    }

    public function it_belongs_to_one_user()
    {
        $this->user()->shouldDefineRelationship('belongsTo', 'Todo\Models\User');
    }

    public function it_has_many_tags()
    {
        $this->tags()->shouldDefineRelationship('hasMany', 'Todo\Models\Tag');
    }

    public function it_has_many_comments()
    {
        $this->comments()->shouldDefineRelationship('hasMany', 'Todo\Models\Comment');
    }

}
