<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpPreferredLocation extends Model
{
    protected $fillable = [
        'user_id', 'locations_id'
    ];

    public function relLocation()
    {
        return $this->belongsTo('App\Location', 'locations_id', 'id');
    }

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }
}
