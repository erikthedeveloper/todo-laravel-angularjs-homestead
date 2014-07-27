<?php

namespace Todo\Models;

class User extends BaseModel { 

    protected $fillable = [
        'email',
        'first_name',
        'last_name'
    ];

    public function tasks()
    {
        return $this->hasMany('Todo\Models\Task');
    }

    public function tags()
    {
        return $this->hasMany('Todo\Models\Tag');
    }

    public function comments()
    {
        return $this->hasMany('Todo\Models\Comment');
    }
}
