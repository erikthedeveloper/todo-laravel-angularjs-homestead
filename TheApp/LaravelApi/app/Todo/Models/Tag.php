<?php

namespace Todo\Models;

class Tag extends BaseModel {

    protected $fillable = [];

    public function tasks()
    {
        return $this->belongsToMany('Todo\Models\Task');
    }
}
