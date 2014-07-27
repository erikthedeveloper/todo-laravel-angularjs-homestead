<?php

namespace Todo\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class BaseModel extends Eloquent {

    /**
     * This must be set on a per model basis. Used to prevent mass assignment vulnerabilities.
     * @var array
     */
    protected $fillable = [];

}
