<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function option()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
