<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpCredential extends Model
{
	protected $fillable = [
        'user_id', 'credential_type', 'filename'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }
}