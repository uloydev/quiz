<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $withCount = ['questions'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function attemps()
    {
        return $this->hasMany('App\Models\Attemp');
    }
}
