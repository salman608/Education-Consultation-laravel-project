<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpAvailability extends Model
{
    protected $fillable = [
        'user_id', 'day'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }
}
