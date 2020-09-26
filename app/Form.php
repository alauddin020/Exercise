<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];
    protected $casts = ['checkbox'=>'object','multi_select'=>'object'];
}
