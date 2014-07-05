<?php

namespace Todo\Models;

class Tag extends BaseModel { 
    public function tasks()
    {
        return $this->hasMany('Todo\Models\Task');
    }

    public function user()
    {
        return $this->belongsTo('Todo\Models\User');
    }
}
