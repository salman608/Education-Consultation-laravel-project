<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpEducational extends Model
{
	protected $fillable = [
        'user_id', 'level_of_education', 'degree_title', 'group_name', 'institute_name', 'result', 'year_of_passing', 'curriculum', 'current_year', 'from_date', 'until_date', 'is_until'
    ];

    public function relTutorProfile()
    {
        return $this->belongsTo('App\TutorProfile', 'user_id', 'user_id');
    }
}
