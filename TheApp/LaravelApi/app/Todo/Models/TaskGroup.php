<?php

namespace Todo\Models;

class TaskGroup extends BaseModel {

    protected $fillable = [];

    public function tasks()
    {
        return $this->hasMany('Todo\Models\Task');
    }
}
