<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['answer_option_id'];

    protected $appends = ['answer'];

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

    public function GetAnswerAttribute()
    {
        return 0;
    }
}
