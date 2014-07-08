<?php

namespace Todo\Models;

class TaskGroup extends BaseModel
{

    public function tasks()
    {
        return $this->hasMany('Todo\Models\Task');
    }
}
