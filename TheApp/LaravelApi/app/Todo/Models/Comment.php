<?php

namespace Todo\Models;

class Comment extends BaseModel {

    public function user()
    {
        return $this->belongsTo('Todo\Models\User');
    }

}