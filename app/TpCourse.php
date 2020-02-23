<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpCourse extends Model
{
    protected $fillable = [
        'user_id', 'courses_id'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }

    public function relCourse()
    {
        return $this->belongsTo('App\Course', 'courses_id', 'id');
    }
}
