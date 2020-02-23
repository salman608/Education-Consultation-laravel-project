<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobboard;
use App\TutorProfile;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hot_jobs'] = [];
        $hot_jobs = Jobboard::latest()->where(['is_hot_job' => 1, 'is_published' => 'published'])->get();
        if (!empty($hot_jobs)) {
            $data['hot_jobs'] = $hot_jobs->chunk(10);
        }
        $data['premium_tutors'] = [];
        $premium_tutors = TutorProfile::with(['relTpEducational' => function( $query ){
            $query->orderBy('id', 'desc')->first();
        }])->where(['is_premium' => 1])->get();

        if (!empty($premium_tutors)) {
            $data['premium_tutors'] = $premium_tutors->chunk(10);
        }
        return view('index', $data);
    }

// tutor forofile view

    public function profile()
    {
        return view('tutorprofile');
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
        //
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
    public function destroy($id)
    {
        //
    }
}
