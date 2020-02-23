<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TutorProfile;
use App\User;
use App\Category;
use App\City;
use Illuminate\Support\Facades\DB;

class TutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::pluck('name', 'id');
        $data['cities'] = City::pluck('name', 'id');
        return view('tutors.index', $data);
    }

    public function find_tutors(Request $request)
    {
        $tutors = TutorProfile::orderBy('id', 'desc');

        if ($request->tutor_id) {
            $tutors->whereHas('relUser', function($query) use ($request) {
                return $query->where('id', $request->tutor_id);
            });
        }
        if ($request->tutor_name) {
            $tutors->whereHas('relUser', function($query) use ($request) {
                return $query->where('name', 'like', '%'.$request->tutor_name.'%');
            });
        }
        if ($request->registration_date) {
            $tutors->where('created_at', 'like', ''.date2db($request->registration_date).'%');
        }
        if ($request->categories_id) {
            $tutors->whereHas('relTpCategories', function($query) use ($request) {
                return $query->where('categories_id', $request->categories_id);
            });
        }
        if ($request->courses_id) {
            $tutors->whereHas('relTpCourses', function($query) use ($request) {
                return $query->where('courses_id', $request->courses_id);
            });
        }
        if ($request->subjects_id) {
            $tutors->whereHas('relTpSubject', function($query) use ($request) {
                return $query->where('subjects_id', $request->subjects_id);
            });
        }
        if ($request->institute_name) {
            $tutors->whereHas('relTpEducational', function($query) use ($request) {
                return $query->where('institute_name', $request->institute_name);
            });
        }
        if ($request->city_id) {
            $tutors->where('city_id', $request->city_id);
        }
        if ($request->locations_id) {
            $tutors->where('locations_id', $request->locations_id);
        }
        if ($request->gender != 'Any') {
            $tutors->where('gender', $request->gender);
        }
        $data['tutors'] = $tutors->get();
        $data['counter'] = $tutors->count();
        return response()->json(view('component.find_tutors', $data)->render());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = TutorProfile::with(['relUser', 'relTpAvailability', 'relTpCategories' => function( $query ){
            $query->with('relCategory');
        }, 'relTpCourses' => function( $query ){
            $query->with('relCourse');
        }, 'relTpSubject' => function( $query ){
            $query->with('relSubject');
        }, 'relTpEducational', 'relTpPreferredLocations' => function( $query ){
            $query->with('relLocation');
        }, 'relTpProvideService', 'relTpTutoringStyle', 'relCity', 'relLocation', 'relTpCredential'])->where('user_id', $id)->first();

        $profile_courses_subjects = [];
        if (!empty($profile->relTpCourses)) {
            foreach ($profile->relTpCourses as $key => $course) {
                foreach ($profile->relTpSubject as $key => $subject) {
                    if ($course->courses_id == $subject->relSubject->courses_id) {
                    $profile_courses_subjects[$course->relCourse->name][] = $subject->relSubject->name;
                    }
                }
            }
        }
        $data['profile_courses_subjects'] = $profile_courses_subjects;
        
        $data['profile'] = $profile;
        $data['empty'] = "Not Available";
        $data['percentage'] = TutorProfile::tutorProfilePercentage( $profile );
        return view('tutors.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function premium($id)
    {
        try {
            DB::beginTransaction();
            $tutor = TutorProfile::where('user_id', $id)->update([
                'is_premium' => 1
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Tutor premium successful!']);
        } catch (\PDOException $e) {
            session()->flash('message', ['error' => 'Tutor premium failed!']);
            DB::rollBack();
        }
        return redirect()->route('tutors.show', $id);
    }

    public function general($id)
    {
        try {
            DB::beginTransaction();
            $tutor = TutorProfile::where('user_id', $id)->update([
                'is_premium' => 0
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Tutor premium removed!']);
        } catch (\PDOException $e) {
            session()->flash('message', ['error' => 'Tutor premium removed failed!']);
            DB::rollBack();
        }
        return redirect()->route('tutors.show', $id);
    }
}
