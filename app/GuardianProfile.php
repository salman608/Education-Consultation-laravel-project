<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardianProfile extends Model
{
	protected $fillable = [
        'user_id', 'phone', 'address', 'photo', 'hear_about_us'
    ];
    
    public function relUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
