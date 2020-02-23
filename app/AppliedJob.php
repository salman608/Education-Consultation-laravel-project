<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
	protected $fillable = [
        'user_id', 'jobboard_id'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }

    public function relJobboard()
    {
        return $this->belongsTo('App\Jobboard', 'jobboard_id', 'id');
    }
}
