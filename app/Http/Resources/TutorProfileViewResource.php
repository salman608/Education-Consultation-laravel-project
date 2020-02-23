<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorProfileViewResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $preserveKeys = true;
    
    public function toArray($request)
    {
        return [
            'id' => $this->relUser->id,
            'name' => $this->relUser->name,
            'email' => $this->relUser->email,
            'email_verified_at' => $this->relUser->email_verified_at,
            'role' => $this->relUser->role,
            'phone' => $this->phone,
            'nid' => $this->nid,
            'city' => $this->relCity->name,
            'location' => $this->relLocation->name,
            'have_experience' => $this->have_experience,
            'experience' => ($this->have_experience == 'Yes') ? $this->experience : NULL,
            'salary' => $this->salary,
            'gender' => $this->gender,
            'identity' => $this->identity,
            'facebook_link' => $this->facebook_link,
            'address' => $this->address,
            'father_name' => $this->father_name,
            'father_mobile_no' => $this->father_mobile_no,
            'mother_name' => $this->mother_name,
            'mother_mobile_no' => $this->mother_mobile_no,
            'emergency_name' => $this->emergency_name,
            'emergency_mobile_no' => $this->emergency_mobile_no,
            'emergency_relation' => $this->emergency_relation,
            'emergency_address' => $this->emergency_address,
            'photo' => $this->photo,
            'registration_date' => $this->relUser->created_at,
            'categories' => $this->relTpCategories->map(function ($loop) {
                return ['name' => $loop->relCategory->name];
            }),
            /*'courses' => $this->relTpCourses->map(function ($loop) {

                $users = $loop->relCourse->get()->map(function($user) {
                    return $user->relSubjects->pluck('name');
                });
                return ['course_name' => $loop->relCourse->name, 'subjects' => $users];


                //return ['course_name' => $loop->relCourse->name];
            }),*/
            'preferred_locations' => $this->relTpPreferredLocations->map(function ($loop) {
                return ['name' => $loop->relLocation->name];
            }),
            'provide_service' => $this->relTpProvideService->map(function ($loop) {
                return ['name' => $loop->name];
            }),
            'tutoring_style' => $this->relTpTutoringStyle->map(function ($loop) {
                return ['name' => $loop->name];
            }),
            'educations' => $this->relTpEducational->map(function ($loop) {
                return [
                    'level_of_education' => $loop->level_of_education,
                    'degree_title' => $loop->degree_title,
                    'group_name' => $loop->group_name,
                    'institute_name' => $loop->institute_name,
                    'result' => $loop->result,
                    'year_of_passing' => $loop->year_of_passing,
                    'curriculum' => $loop->curriculum,
                    'from_date' => $loop->from_date,
                    'until_date' => (empty($loop->is_until)) ? $loop->until_date : NULL,
                    'is_until' => (!empty($loop->is_until)) ? 'true' : 'false',
                ];
            }),
            'availability' => $this->relTpAvailability->map(function ($loop) {
                return [
                    'day' => $loop->day,
                    'from_time' => $this->from_time,
                    'to_time' => $this->to_time,
                ];
            }),
        ];
    }
}
