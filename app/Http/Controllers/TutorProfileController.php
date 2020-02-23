<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use App\City;
use App\Location;
use App\TutorProfile;
use App\TpCategory;
use App\TpCourse;
use App\TpSubject;
use App\TpPreferredLocation;
use App\TpProvideService;
use App\TpAvailability;
use App\TpTutoringStyle;
use App\TpEducational;
use App\TpCredential;
use App\Http\Resources\TutorProfileViewResource;
use Illuminate\Support\Facades\Storage;
use Image;

class TutorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function generate_cv()
    {
        $profile = TutorProfile::with(['relUser', 'relTpAvailability', 'relTpCategories' => function( $query ){
            $query->with('relCategory');
        }, 'relTpCourses' => function( $query ){
            $query->with('relCourse');
        }, 'relTpSubject' => function( $query ){
            $query->with('relSubject');
        }, 'relTpEducational', 'relTpPreferredLocations' => function( $query ){
            $query->with('relLocation');
        }, 'relTpProvideService', 'relTpTutoringStyle', 'relCity', 'relLocation', 'relTpCredential'])->where('user_id', auth()->user()->id)->first();

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
        $data['empty'] = "Not Available";
        $data['profile_courses_subjects'] = $profile_courses_subjects;
        $data['profile'] = $profile;
        $filename = 'tutor_cv_'.$profile->phone.'_'.$profile->user_id;

        $file_path = storage_path('upload/'.$filename.'.pdf');
        $view = \View::make('profile.tutor.cv', $data);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
        $mpdf->SetTitle('CV of '.$profile->relUser->name.'');
        $mpdf->WriteHTML(file_get_contents( asset('assets/pdf_style.css') ), 1);
        $mpdf->WriteHTML($view, 2);
        $mpdf->Output($file_path, 'F');
        return $mpdf->Output($filename, 'I');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = TutorProfile::with(['relUser', 'relTpAvailability', 'relTpCategories' => function( $query ){
            $query->with('relCategory');
        }, 'relTpCourses' => function( $query ){
            $query->with('relCourse');
        }, 'relTpSubject' => function( $query ){
            $query->with('relSubject');
        }, 'relTpEducational', 'relTpPreferredLocations' => function( $query ){
            $query->with('relLocation');
        }, 'relTpProvideService', 'relTpTutoringStyle', 'relCity', 'relLocation', 'relTpCredential'])->where('user_id', auth()->user()->id)->first();

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
        $data['mustbe'] = "Must be given";
        $data['percentage'] = TutorProfile::tutorProfilePercentage();
        return view('profile.tutor.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = TutorProfile::with(['relUser', 'relTpAvailability', 'relTpCategories' => function( $query ){
            $query->with('relCategory');
        }, 'relTpCourses' => function( $query ){
            $query->with('relCourse');
        }, 'relTpSubject' => function( $query ){
            $query->with('relSubject');
        }, 'relTpEducational', 'relTpPreferredLocations' => function( $query ){
            $query->with('relLocation');
        }, 'relTpProvideService', 'relTpTutoringStyle', 'relCity', 'relLocation'])->where('user_id', auth()->user()->id)->first();


        $data['profile'] = $profile;
        $profile_categories = $profile->relTpCategories->map(function ($loop) {
            return $loop->relCategory->id;
        })->toArray();
        $data['profile_categories'] = $profile_categories;

        $profile_courses = $profile->relTpCourses->map(function ($loop) {
            return $loop->relCourse->id;
        })->toArray();
        $data['profile_courses'] = $profile_courses;

        $profile_subjects = $profile->relTpSubject->map(function ($loop) {
            return $loop->relSubject->id;
        })->toArray();
        $data['profile_subjects'] = $profile_subjects;

        $cources_array = [];
        $categories = Category::with('relCourses')->whereIn('id', $profile_categories)->get();
        if (!empty($categories)) {
            foreach ($categories as $key => $category) {
                foreach ($category->relCourses as $key => $course) {
                    $cources_array[$category->name][$course->id] = $course->name;
                }
            }
        }
        $data['selected_courses'] = $cources_array;

        $subject_array = [];
        $courses = Course::whereIn('id', $profile_courses)->get();
        if (!empty($courses)) {
            foreach ($courses as $key => $course) {
                foreach ($course->relSubjects as $key => $subject) {
                    $subject_array[$course->name][$subject->id] = $subject->name;
                }
            }
        }
        $data['selected_subject'] = $subject_array;

        $preferred_locations_id = $profile->relTpPreferredLocations->map(function ($loop) {
            return $loop->relLocation->id;
        })->toArray();
        $data['preferred_locations_id'] = $preferred_locations_id;

        $provide_service = $profile->relTpProvideService->map(function ($loop) {
            return $loop->name;
        })->toArray();
        $data['provide_service'] = $provide_service;

        $availability = $profile->relTpAvailability->map(function ($loop) {
            return $loop->day;
        })->toArray();
        $data['availability'] = $availability;

        $tutoring_style = $profile->relTpTutoringStyle->map(function ($loop) {
            return $loop->name;
        })->toArray();
        $data['tutoring_style'] = $tutoring_style;

        $data['categories'] = Category::pluck('name', 'id');
        $data['cities'] = City::pluck('name', 'id');
        $data['locations'] = Location::pluck('name', 'id');
        $data['selected_locations'] = Location::where('city_id', $profile->city_id)->pluck('name', 'id');
        $data['profile'] = TutorProfile::where('user_id', auth()->user()->id)->first();
        $data['percentage'] = TutorProfile::tutorProfilePercentage();
        return view('profile.tutor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tuition(Request $request)
    {
        $request->validate([
            'categories_id' => ['required', 'array'],
            'categories_id.*' => ['required', 'numeric', 'gte:1', 'exists:categories,id'],
            'courses_id' => ['required', 'array'],
            'courses_id.*' => ['required', 'numeric', 'gte:1', 'exists:courses,id'],
            'subjects_id' => ['required', 'array'],
            'subjects_id.*' => ['required', 'numeric', 'gte:1', 'exists:subjects,id'],
            'city_id' => ['required', 'numeric', 'gte:1', 'exists:cities,id'],
            'locations_id' => ['required', 'numeric', 'gte:1', 'exists:locations,id'],
            'preferred_locations_id' => ['required', 'array'],
            'preferred_locations_id.*' => ['required', 'numeric', 'gte:1', 'exists:locations,id'],
            'provide_service' => ['required', 'array', 'in:Student Home,My Home,Online'],
            'experience' => ['required', 'string', 'in:Yes,No'],
            'total_experience' => ['required_if:experience,==,Yes'],
            'availability' => ['required', 'array', 'in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday'],
            'from_time' => ['required'],
            'to_time' => ['required'],
            'salary' => ['required', 'numeric', 'gte:1'],
            'tutoring_style' => ['required', 'array', 'in:One to one,One to many,Online tutoring'],
        ]);

        try {
            DB::beginTransaction();

            TutorProfile::where('user_id', auth()->user()->id)->update([
                'city_id' => $request->city_id,
                'locations_id' => $request->locations_id,
                'have_experience' => $request->experience,
                'experience' => ($request->experience == 'Yes') ? $request->total_experience : NULL,
                'salary' => $request->salary,
                'from_time' => $request->from_time,
                'to_time' => $request->to_time,
            ]);

            TpCategory::where('user_id', auth()->user()->id)->delete();
            foreach ($request->categories_id as $key => $value)
            {
                TpCategory::create([
                    'user_id' => auth()->user()->id,
                    'categories_id' => (int)$value
                ]);
            }

            TpCourse::where('user_id', auth()->user()->id)->delete();
            foreach ($request->courses_id as $key => $value)
            {
                TpCourse::create([
                    'user_id' => auth()->user()->id,
                    'courses_id' => (int)$value
                ]);
            }

            TpSubject::where('user_id', auth()->user()->id)->delete();
            foreach ($request->subjects_id as $key => $value)
            {
                TpSubject::create([
                    'user_id' => auth()->user()->id,
                    'subjects_id' => (int)$value
                ]);
            }

            TpPreferredLocation::where('user_id', auth()->user()->id)->delete();
            foreach ($request->preferred_locations_id as $key => $value)
            {
                TpPreferredLocation::create([
                    'user_id' => auth()->user()->id,
                    'locations_id' => (int)$value
                ]);
            }

            TpProvideService::where('user_id', auth()->user()->id)->delete();
            foreach ($request->provide_service as $key => $value)
            {
                TpProvideService::create([
                    'user_id' => auth()->user()->id,
                    'name' => $value
                ]);
            }

            TpAvailability::where('user_id', auth()->user()->id)->delete();
            foreach ($request->availability as $key => $value)
            {
                TpAvailability::create([
                    'user_id' => auth()->user()->id,
                    'day' => $value,
                ]);
            }

            TpTutoringStyle::where('user_id', auth()->user()->id)->delete();
            foreach ($request->tutoring_style as $key => $value)
            {
                TpTutoringStyle::create([
                    'user_id' => auth()->user()->id,
                    'name' => $value,
                ]);
            }

            DB::commit();

            return response()->json(['success' => 'Profile update successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Profile update failed!'], 400);
        }
    }

    public function education(Request $request)
    {
        $request->validate([
            'level_of_education' => ['required', 'string', 'in:Secondary,Higher Secondary,Diploma,Bachelor/Honors,Masters,Doctoral',],
            'degree_title' => ['string'],
            'group_name' => ['required', 'string'],
            'institute_name' => ['required', 'string'],
            'curriculum' => ['required', 'string', 'in:Bangla version,English version,Cambridge,Ed-excel,IB'],
            'is_until' => ['required', 'string', 'in:1st Year,2nd Year,3rd Year,Final Year,Completed'],
            'result' => ['required_if:is_until,Completed', 'nullable', 'string'],
            'year_of_passing' => ['required_if:is_until,Completed', 'nullable', 'string'],
            'from_date' => ['required_if:is_until,Completed', 'nullable', 'date', 'date_format:"d-m-Y"'],
            'until_date' => ['required_if:is_until,Completed', 'nullable', 'date', 'date_format:"d-m-Y"'],
        ]);

        try {
            DB::beginTransaction();
            TpEducational::create([
                'user_id' => auth()->user()->id,
                'level_of_education' => $request->level_of_education,
                'degree_title' => $request->degree_title,
                'group_name' => $request->group_name,
                'institute_name' => $request->institute_name,
                'curriculum' => $request->curriculum,
                'result' => $request->result,
                'year_of_passing' => $request->year_of_passing,
                'from_date' => date2db($request->from_date),
                'until_date' => ($request->is_until == 'Completed') ? date2db($request->until_date) : NULL,
                'is_until' => ($request->is_until == 'Completed') ? 'false' : 'true',
                'current_year' => $request->is_until,
            ]);
            DB::commit();

            return response()->json(['success' => 'Profile update successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Profile update failed!'], 400);
        }
    }

    public function personal(Request $request)
    {

        $request->validate([
            'gender' => ['required', 'string', 'in:Male,Female'],
            'identity' => ['required', 'string'],
            'facebook_link' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'father_name' => ['nullable', 'required', 'string'],
            'father_mobile_no' => ['required', 'string', 'min:11', 'max:11', 'unique:tutor_profiles,user_id,'.auth()->user()->id],
            'mother_name' => ['required', 'string'],
            'mother_mobile_no' => ['required', 'string', 'min:11', 'max:11', 'unique:tutor_profiles,user_id,'.auth()->user()->id],
            'emergency_name' => ['required', 'string'],
            'emergency_mobile_no' => ['required', 'string', 'min:11', 'max:11', 'unique:tutor_profiles,user_id,'.auth()->user()->id],
            'emergency_relation' => ['required', 'string'],
            'emergency_address' => ['nullable', 'string'],
        ]);

        try {
            DB::beginTransaction();
            TutorProfile::where('user_id', auth()->user()->id)->update([
                'gender' => $request->gender,
                'identity' => $request->identity,
                'facebook_link' => $request->facebook_link,
                'address' => $request->address,
                'father_name' => $request->father_name,
                'father_mobile_no' => $request->father_mobile_no,
                'mother_name' => $request->mother_name,
                'mother_mobile_no' => $request->mother_mobile_no,
                'emergency_name' => $request->emergency_name,
                'emergency_mobile_no' => $request->emergency_mobile_no,
                'emergency_relation' => $request->emergency_relation,
                'emergency_address' => $request->emergency_address,
            ]);
            DB::commit();

            return response()->json(['success' => 'Profile update successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Profile update failed!'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_profile_photo()
    {
        $data['profile'] = TutorProfile::where('user_id', auth()->user()->id)->first('photo');
        return view('profile.tutor.upload_profile_photo', $data);
    }

    public function store_profile_photo(Request $request)
    {

        $filename = $request->profile_photo;
        try {
            DB::beginTransaction();

            $file_type = substr($filename, 5, strpos($filename, ';')-5);

            list($type, $filename) = explode(';', $filename);
            list(, $filename)      = explode(',', $filename);

            $filename = base64_decode($filename);
            $image_name = 'tutor_'.time().'.'.explode('/', $file_type)[1];
            $path = storage_path() . "/upload/" . $image_name;
            file_put_contents($path, $filename);

            $previous_file_name = TutorProfile::where('user_id', auth()->user()->id)->first('photo');
            TutorProfile::where('user_id', auth()->user()->id)->update([
                'photo' => $image_name
            ]);

            if (file_exists(storage_path() . "/upload/" . $previous_file_name->photo)) {
                Storage::delete(storage_path() . "/upload/" . $previous_file_name->photo);
            }

            DB::commit();
            return response()->json(['success' => 'Profile photo update successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Profile photo update failed!'], 400);
        }
    }
//tutore document sore
public function store_credentials(Request $request)
{
    $request->validate([
        'credential_type' => ['required', 'string', 'in:SSC/O Level Marksheets/ certificates,HSC/A Level Marksheets/ certificates,NID/ Passport/ Birth certificates,University ID,Others'],
        'credentials_files' => ['required', 'image', 'mimes:jpeg,jpg'],
    ]);

    $credential_type = str_replace(['/', ' '], ['_'], strtolower($request->credential_type));

    if ($request->hasFile('credentials_files') && $request->file('credentials_files')->isValid()){

        $image = $request->file('credentials_files');
        $extention = strtolower($image->getClientOriginalExtension());

        $filename = 'tutor_credentials_' . $credential_type . '_' . auth()->user()->id . '.' . $extention;


        try {
            DB::beginTransaction();
            $request->file('credentials_files')->move(storage_path('/upload'), $filename);

            $credential = TpCredential::where(['user_id' => auth()->user()->id, 'credential_type' => $request->credential_type]);
            if ($credential->exists()) {
                $delete = $credential->first();
                $delete->delete();
            }
            TpCredential::create([
                'user_id' => auth()->user()->id,
                'credential_type' => $request->credential_type,
                'filename' => $filename,
            ]);
            DB::commit();
            return response()->json(['success' => 'Documents upload successful!'], 200);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Documents upload failed!'], 400);
        }
     }
}

    //end


}
