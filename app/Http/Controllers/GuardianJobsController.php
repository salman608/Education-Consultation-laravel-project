<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobboard;
use App\JbSubject;
use App\City;
use App\Category;
use App\Course;
use App\Subject;
use App\Location;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GuardianJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
            $segment_two = request()->segment(2);
            $data['jobs'] = Jobboard::with('relCity', 'relLocation', 'relAppliedJobs')->where('is_published', $segment_two)->orderBy('id', 'desc')->get();
            return view('jobboard.admin.index', $data);
        }
        if(auth()->user()->role == 'guardian')
        {
            $data['jobs'] = Jobboard::where('user_id', auth()->user()->id)->whereIn('is_published', ['reviewing', 'published'])->orderBy('id', 'desc')->get();
            return view('jobboard.guardian.index', $data);
        }
    }

    public function hot_jobs()
    {
        $data['jobs'] = Jobboard::with('relCity', 'relLocation', 'relAppliedJobs')->where('is_hot_job', 1)->orderBy('id', 'desc')->get();
        return view('jobboard.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name', 'id');
        $data['cities'] = City::pluck('name', 'id');
        return view('jobboard.guardian.create', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id = null)
    {
        $messages = [
            'subjects_id.*' => 'The selected subjects id is invalid.'
        ];

        $validation_array = [
            'categories_id' => ['required', 'numeric', 'gte:1', 'exists:categories,id'],
            'courses_id' => ['required', 'numeric', 'gte:1', 'exists:courses,id'],
            'subjects_id' => ['required', 'array'],
            'subjects_id.*' => ['required', 'numeric', 'gte:1', 'exists:subjects,id'],
            'city_id' => ['required', 'numeric', 'gte:1', 'exists:cities,id'],
            'locations_id' => ['required', 'numeric', 'gte:1', 'exists:locations,id'],
            'salary' => ['required_unless:salary_negotiate,on', 'numeric', 'gte:1'],
            'no_of_students' => ['required', 'numeric', 'gte:1', 'lte:10'],
            'institute_name' => ['required', 'string', 'max:100'],
            'student_gender' => ['required', 'string', 'in:male,female'],
            'peferred_gender' => ['required', 'string', 'in:any,male,female'],
            'tutoring_time' => ['required_unless:tutoring_time_negotiate,on'],
            'weekly' => ['required', 'numeric', 'gte:1', 'lte:7'],
            'hire_date' => ['required', 'date', 'date_format:"d-m-Y"'],
            'requirements' => ['max:255'],
        ];
        if (isset($data['job_id'])) {
            $validation_array['job_id'] = ['required', 'string', 'unique:jobboards,job_id,'.$id];
        }
        return Validator::make($data, $validation_array, $messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();

            $jobboard = Jobboard::create([
                'user_id' => auth()->user()->id,
                'categories_id' => $request->categories_id,
                'courses_id' => $request->courses_id,
                'city_id' => $request->city_id,
                'locations_id' => $request->locations_id,
                'salary' => (!empty($request->salary)) ? $request->salary : NULL,
                'no_of_students' => $request->no_of_students,
                'institute_name' => $request->institute_name,
                'student_gender' => $request->student_gender,
                'peferred_gender' => $request->peferred_gender,
                'tutoring_time' => (!empty($request->tutoring_time)) ? $request->tutoring_time : NULL,
                'weekly' => $request->weekly,
                'hire_date' => date2db($request->hire_date),
                'is_published' => 'reviewing',
                'requirements' => $request->requirements,
            ]);

            foreach ($request->subjects_id as $key => $value)
            {
                JbSubject::create([
                    'jobboard_id' => $jobboard->id,
                    'subjects_id' => (int)$value
                ]);
            }

            DB::commit();
            
            return response()->json(['success' => 'Create tuition jobs successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Create tuition jobs failed!'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->role == 'admin')
        {
            $data['job'] = Jobboard::with('relCity', 'relLocation', 'relAppliedJobs')->where(['id' => $id])->first();
            return view('jobboard.admin.show', $data);
        }
        if(auth()->user()->role == 'guardian')
        {
            $data['job'] = Jobboard::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
            return view('jobboard.guardian.show', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->role == 'admin')
        {
            $data['empty'] = "Not Available";
            $job = Jobboard::where(['id' => $id])->first();
            $data['categories'] = Category::pluck('name', 'id');
            $data['cities'] = City::pluck('name', 'id');

            $data['selected_locations'] = [];
            if (!empty($job)) {
                $data['selected_locations'] = Location::where('city_id', $job->city_id)->pluck('name', 'id');
                $data['selected_courses'] = Course::where('categories_id', $job->categories_id)->pluck('name', 'id');;
                $data['selected_subject'] = Subject::where('courses_id', $job->courses_id)->get();

                $data['subject_id'] = $job->relJbSubject->pluck('subjects_id')->toArray();
            }
            $data['job'] = $job;
            return view('jobboard.admin.edit', $data);
        }
        if(auth()->user()->role == 'guardian')
        {
            $data['job'] = Jobboard::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
            return view('jobboard.guardian.edit', $data);
        }
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
        $this->validator($request->all(), $id)->validate();

        try {
            DB::beginTransaction();

            $jobboard = Jobboard::where('id', $id)->update([
                'job_id' => $request->job_id,
                'categories_id' => $request->categories_id,
                'courses_id' => $request->courses_id,
                'city_id' => $request->city_id,
                'locations_id' => $request->locations_id,
                'salary' => (!empty($request->salary)) ? $request->salary : NULL,
                'no_of_students' => $request->no_of_students,
                'institute_name' => $request->institute_name,
                'student_gender' => $request->student_gender,
                'peferred_gender' => $request->peferred_gender,
                'tutoring_time' => (!empty($request->tutoring_time)) ? $request->tutoring_time : NULL,
                'weekly' => $request->weekly,
                'hire_date' => date2db($request->hire_date),
                'requirements' => $request->requirements,
                'is_hot_job' => (!empty($request->is_hot_job)) ? 1 : 0,
            ]);

            JbSubject::where('jobboard_id', $id)->delete();
            if (!empty($request->subjects_id)) {
                foreach ($request->subjects_id as $key => $value)
                {
                    JbSubject::create([
                        'jobboard_id' => $id,
                        'subjects_id' => (int)$value
                    ]);
                }
            }

            DB::commit();
            
            return response()->json(['success' => 'Update tuition jobs successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Update tuition jobs failed!'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->role == 'admin')
        {
            $jobboard = Jobboard::where('id', $id)->first();
            if (!empty($jobboard)) {
                try {
                    DB::beginTransaction();

                    if ($jobboard->is_published == 'reviewing') {
                        $message = 'Delete';
                        $jobboard->delete();
                        JbSubject::where('jobboard_id', $id)->delete();
                    }

                    if ($jobboard->is_published == 'published') {
                        $message = 'Complete';
                        Jobboard::where('id', $id)->update([
                            'is_published' => 'completed'
                        ]);
                    }

                    DB::commit();
                    
                    session()->flash('message', ['success' => ''.$message.' tuition jobs successful!']);

                } catch (\PDOException $e) {
                    DB::rollBack();
                    session()->flash('message', ['error' => ''.$message.' tuition jobs failed!']);
                }
            }
            else
            {
                session()->flash('message', ['error' => 'Tuition jobs not found!']);
            }
        }
        return redirect()->route('jobs.index');
    }

    public function approve($id)
    {
        if(auth()->user()->role == 'admin')
        {
            $jobboard = Jobboard::where(['id' => $id, 'is_published' => 'reviewing'])->first();
            if (!empty($jobboard)) {
                try {
                    DB::beginTransaction();

                    Jobboard::where('id', $id)->update([
                        'is_published' => 'published'
                    ]);

                    DB::commit();
                    
                    session()->flash('message', ['success' => 'Published tuition jobs successful!']);

                } catch (\PDOException $e) {
                    DB::rollBack();
                    session()->flash('message', ['error' => 'Published tuition jobs failed!']);
                }
            }
            else
            {
                session()->flash('message', ['error' => 'Tuition jobs not found!']);
            }
        }
        return redirect()->route('jobs.show', $id);
    }
}
