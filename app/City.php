<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public function relLocation()
    {
        return $this->hasMany('App\Location', 'city_id', 'id');
    }
}
