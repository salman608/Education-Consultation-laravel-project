<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpProvideService extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }
}
