<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function relCourses()
    {
        return $this->hasMany('App\Course', 'categories_id', 'id');
    }

    public function relTpCategory()
    {
        return $this->hasMany('App\TpCategory', 'categories_id', 'id');
    }
}
