<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JbSubject extends Model
{
	protected $fillable = [
        'jobboard_id', 'subjects_id'
    ];

    public function relJobboard()
    {
        return $this->belongsTo('App\Jobboard', 'jobboard_id', 'id');
    }

    public function relSubject()
    {
        return $this->belongsTo('App\Subject', 'subjects_id', 'id');
    }
}
