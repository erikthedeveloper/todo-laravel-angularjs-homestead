<?php

namespace Todo\Models;

class Comment extends BaseModel {

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('Todo\Models\User');
    }

}