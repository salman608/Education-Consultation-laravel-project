<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorProfile extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'photo', 'father_mobile_no', 'mother_mobile_no', 'city_id', 'locations_id', 'facebook_link', 'is_premium'
    ];
    
    public function relUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function relCity()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }
    
    public function relLocation()
    {
        return $this->belongsTo('App\Location', 'locations_id', 'id');
    }
    
    public function relTpAvailability()
    {
        return $this->hasMany('App\TpAvailability', 'user_id', 'user_id');
    }
    
    public function relTpCategories()
    {
        return $this->hasMany('App\TpCategory', 'user_id', 'user_id');
    }
    
    public function relTpCourses()
    {
        return $this->hasMany('App\TpCourse', 'user_id', 'user_id');
    }
    
    public function relTpEducational()
    {
        return $this->hasMany('App\TpEducational', 'user_id', 'user_id');
    }
    
    public function relTpPreferredLocations()
    {
        return $this->hasMany('App\TpPreferredLocation', 'user_id', 'user_id');
    }
    
    public function relTpProvideService()
    {
        return $this->hasMany('App\TpProvideService', 'user_id', 'user_id');
    }
    
    public function relTpSubject()
    {
        return $this->hasMany('App\TpSubject', 'user_id', 'user_id');
    }
    
    public function relTpTutoringStyle()
    {
        return $this->hasMany('App\TpTutoringStyle', 'user_id', 'user_id');
    }
    
    public function relTpCredential()
    {
        return $this->hasMany('App\TpCredential', 'user_id', 'user_id');
    }

    public static function tutorProfilePercentage( $profile = null )
    {
        if (empty($profile)) {
            $profile = TutorProfile::with(['relUser', 'relTpAvailability', 'relTpCategories' => function( $query ){
                $query->with('relCategory');
            }, 'relTpCourses' => function( $query ){
                $query->with('relCourse');
            }, 'relTpSubject' => function( $query ){
                $query->with('relSubject');
            }, 'relTpEducational', 'relTpPreferredLocations' => function( $query ){
                $query->with('relLocation');
            }, 'relTpProvideService', 'relTpTutoringStyle', 'relCity', 'relLocation'])->where('user_id', auth()->user()->id)->first();
        }

        $percentage = 0;
        if (!empty($profile->relUser->name)) {
            $percentage = ($percentage + 5);
        }
        if (!empty($profile->relUser->email)) {
            $percentage = ($percentage + 5);
        }
        if (!empty($profile->phone)) {
            $percentage = ($percentage + 5);
        }
        if (!empty($profile->father_mobile_no) || !empty($profile->mother_mobile_no)) {
            $percentage = ($percentage + 5);
        }
        if (!empty($profile->relCity->name)) {
            $percentage = ($percentage + 5);
        }
        if (!empty($profile->relLocation->name)) {
            $percentage = ($percentage + 5);
        }
        if (count($profile->relTpEducational) == 1) {
            $percentage = ($percentage + 10);
        }
        /* 40% */
        if (!empty($profile->photo)) {
            $percentage = ($percentage + 10);
        }
        if (count($profile->relTpCredential) > 0) {

            if ($profile->relTpCredential->where('credential_type', 'NID/ Passport/ Birth certificates')->count() > 0) {
                $percentage = ($percentage + 5);
            }
            if (($profile->relTpCredential->where('credential_type', 'University ID')->count() > 0) || ($profile->relTpCredential->where('credential_type', 'HSC/A Level Marksheets/ certificates')->count() > 0)) {
                $percentage = ($percentage + 5);
            }

        }
        /* 20% */


        if (!empty($profile->gender)) {
            $percentage = ($percentage + 2);
        }
        if (!empty($profile->identity)) {
            $percentage = ($percentage + 2);
        }
        if (!empty($profile->father_name)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->mother_name)) {
            $percentage = ($percentage + 2);
        }
        if (!empty($profile->emergency_name)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->emergency_mobile_no)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->emergency_relation)) {
            $percentage = ($percentage + 1);
        }
        /* 10% */

        if (count($profile->relTpEducational) > 1) {
            $percentage = ($percentage + 25);
        }
        /* 20% */

        if (count($profile->relTpCategories) > 0) {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpCourses) > 0) {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpSubject) > 0) {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpPreferredLocations) > 0) {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpProvideService) > 0) {
            $percentage = ($percentage + 1);
        }
        if ($profile->have_experience == 'Yes') {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpAvailability) > 0) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->from_time) && !empty($profile->to_time)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->salary)) {
            $percentage = ($percentage + 1);
        }
        if (count($profile->relTpTutoringStyle) > 0) {
            $percentage = ($percentage + 1);
        }
        /* 10% */

        /*
        if (!empty($profile->address)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->emergency_address)) {
            $percentage = ($percentage + 1);
        }
        if (!empty($profile->experience)) {
            $percentage = ($percentage + 2);
        }*/
        return $percentage;
    }
}



