<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
