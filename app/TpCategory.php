<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpCategory extends Model
{
    protected $fillable = [
        'user_id', 'categories_id'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }

    public function relCategory()
    {
        return $this->belongsTo('App\Category', 'categories_id', 'id');
    }
}
