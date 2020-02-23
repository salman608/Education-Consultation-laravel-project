<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GuardianProfile;
use App\TutorProfile;
use App\Jobboard;
use App\AppliedJob;
use App\Category;
use App\City;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'administrator')
        {
            $data['reviewing'] = Jobboard::where('is_published', 'reviewing')->count();
            $data['published'] = Jobboard::where('is_published', 'published')->count();
            $data['completed'] = Jobboard::where('is_published', 'completed')->count();
            return view('dashboard.administrator', $data);
        }

        if(auth()->user()->role == 'admin')
        {
            $data['today'] = date('l');
            $lastWeek = date('Y-m-d', strtotime('-7 days'));
            $data['weekly_registration'] = User::select(DB::raw('DATE_FORMAT(created_at, "%W") AS week'), DB::raw('COUNT(created_at) AS count'))->where('created_at', '>=', $lastWeek)->where('role', 'tutor')->groupBy(DB::raw('DATE_FORMAT(created_at, "%W")'))->orderBy(DB::raw('DATE_FORMAT(created_at, "%W")'), 'asc')->pluck('count', 'week')->toArray();
            $data['reviewing'] = Jobboard::where('is_published', 'reviewing')->count();
            $data['published'] = Jobboard::where('is_published', 'published')->count();
            $data['completed'] = Jobboard::where('is_published', 'completed')->count();
            return view('dashboard.administrator', $data);
        }
        
        if(auth()->user()->role == 'tutor')
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

            $percentage = TutorProfile::tutorProfilePercentage();
            
            if ($percentage <= 40) {
                session()->flash('message', ['error' => 'Please upload your profile photo!']);
                return redirect()->route('tutor.profile.upload_profile_photo');
            }
            if (($percentage > 40) & ($percentage <= 50)) {
                session()->flash('message', ['error' => 'Please upload your documents!']);
                return redirect()->route('tutor.profile.upload_credentials');
            }

            $data['categories'] = Category::pluck('name', 'id');
            $data['cities'] = City::pluck('name', 'id');
            return view('dashboard.tutor', $data);

            /*if ($percentage >= 60) {
                $data['categories'] = Category::pluck('name', 'id');
                $data['cities'] = City::pluck('name', 'id');
                return view('dashboard.tutor', $data);
            }
            else
            {
                session()->flash('message', ['error' => 'Please complete your profile 100%!']);
                return redirect()->route('tutor.profile.edit');
            }*/
        }
        if(auth()->user()->role == 'guardian')
        {
            $data['posted_jobs'] = Jobboard::where('user_id', auth()->user()->id)->whereIn('is_published', ['published', 'completed'])->count();
            $data['contact_deal'] = Jobboard::where(['user_id' => auth()->user()->id, 'is_published' => 'completed'])->count();
            $data['profile'] = GuardianProfile::where('user_id', auth()->user()->id)->first();
            return view('dashboard.guardian', $data);
        }
        return view('dashboard.administrator');
    }
}
