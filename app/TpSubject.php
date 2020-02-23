<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpSubject extends Model
{
    protected $fillable = [
        'user_id', 'subjects_id'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }

    public function relSubject()
    {
        return $this->belongsTo('App\Subject', 'subjects_id', 'id');
    }
}
