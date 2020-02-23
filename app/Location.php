<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'city_id', 'name'
    ];

    public function relCity()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }
}
