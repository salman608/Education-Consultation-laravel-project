<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobboard extends Model
{
	protected $fillable = [
        'user_id', 'job_id', 'categories_id', 'courses_id', 'curriculum', 'city_id', 'locations_id', 'salary', 'no_of_students', 'institute_name', 'student_gender', 'peferred_gender', 'weekly', 'requirements', 'hire_date', 'tutoring_time', 'is_published', 'is_hot_job'
    ];

    public function relCategories()
    {
        return $this->belongsTo('App\Category', 'categories_id', 'id');
    }

    public function relCourse()
    {
        return $this->belongsTo('App\Course', 'courses_id', 'id');
    }

    public function relJbSubject()
    {
        return $this->hasMany('App\JbSubject', 'jobboard_id', 'id');
    }

    public function relCity()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function relLocation()
    {
        return $this->belongsTo('App\Location', 'locations_id', 'id');
    }
    
    public function relUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function relGuardianProfile()
    {
        return $this->belongsTo('App\GuardianProfile', 'user_id', 'user_id');
    }
    
    public function relAppliedJobs()
    {
        return $this->hasMany('App\AppliedJob', 'jobboard_id', 'id');
    }
}
