<?php

namespace Todo\Models;

class Tag extends BaseModel {
    public function tasks()
    {
        return $this->belongsToMany('Todo\Models\Task');
    }
}
