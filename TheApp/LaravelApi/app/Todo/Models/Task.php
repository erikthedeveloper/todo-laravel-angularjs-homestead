<?php

namespace Todo\Models;

class Task extends BaseModel {

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('Todo\Models\User');
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
