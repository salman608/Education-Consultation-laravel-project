<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'categories_id', 'name'
    ];

    public function relCategories()
    {
        return $this->belongsTo('App\Category', 'categories_id', 'id');
    }

    public function relSubjects()
    {
        return $this->hasMany('App\Subject', 'courses_id', 'id');
    }
}
