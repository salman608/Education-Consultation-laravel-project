<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'courses_id', 'name'
    ];

    public function relCourse()
    {
        return $this->belongsTo('App\Course', 'courses_id', 'id');
    }
}
