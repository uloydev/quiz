<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attemp extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['quiz'];

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }
}
