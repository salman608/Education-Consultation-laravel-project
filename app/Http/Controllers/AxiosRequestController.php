<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Course;
use App\Subject;
use App\Category;
use App\AppliedJob;
use App\Jobboard;

class AxiosRequestController extends Controller
{
	public function public_get_jobs(Request $request)
	{
		$data['jobs'] = $this->get_jobs($request);
		return response()->json(view('component.public_tuitions', $data)->render());
	}

	public function private_get_jobs(Request $request)
	{
		$data['jobs'] = $this->get_jobs($request);
		return response()->json(view('component.private_tuitions', $data)->render());
	}
	public function get_jobs($request)
	{
        $jobs = Jobboard::with('relJbSubject')->where('is_published', 'published');
		
		if (!empty($request->city_id)) {
			$jobs->where('city_id', $request->city_id);
		}

		if (!empty($request->locations_id)) {
			$jobs->whereIn('locations_id', $request->locations_id);
		}

		if (!empty($request->categories_id)) {
			$jobs->whereIn('categories_id', $request->categories_id);
		}

		if (!empty($request->courses_id)) {
			$jobs->whereIn('courses_id', $request->courses_id);
		}

		if (!empty($request->gender)) {
			$jobs->whereIn('peferred_gender', $request->gender);
		}

        return $jobs->orderBy('id', 'desc')->get();
	}

	public function apply_job($id)
	{
		if (empty(auth()->user()->id)) {
			return response()->json(NULL, 404);
		}

		$jobboard = Jobboard::where('id', $id)->first();
		if (empty($jobboard)) {
			return response()->json(['error' => 'Job Not Found.'], 404);
		}
		$check_peferred_gender = in_array($jobboard->peferred_gender, ['any', strtolower(auth()->user()->relTutorsProfile->gender)]);

		if ($check_peferred_gender == false) {
			return response()->json(['error' => 'Sorry! Tutor gender preference is '.$jobboard->peferred_gender.''], 404);
		}

		$exists = AppliedJob::where(['user_id' => auth()->user()->id, 'jobboard_id' => $id])->exists();
		if ($exists) {
            return response()->json(['error' => 'Already applied!'], 400);
		}
		AppliedJob::create([
			'user_id' => auth()->user()->id,
			'jobboard_id' => $id,
		]);
		return response()->json(['success' => 'Apply completed!'], 200);
	}


	public function get_locations( $city_id )
	{
		$locations = Location::where('city_id', $city_id)->pluck('name', 'id');
		if (empty($locations)) {
			$locations = NULL;
		}
		return response()->json($locations);
	}

	public function get_cources( $categories_id )
	{
		$cources = Course::where('categories_id', $categories_id)->pluck('name', 'id');
		if (empty($cources)) {
			$cources = NULL;
		}
		return response()->json($cources);
	}

	public function get_cources_with_group( $categories_id )
	{
		$categories_id = explode(",", $categories_id);
		$cources = Category::whereIn('id', $categories_id)->get()->map(function ($role) {
            $users = $role->relCourses->map(function($user) {
                return ['id' => $user->id, 'text' => $user->name];
            });
            return ['text' => $role->name, 'children' => $users];
        });

		if (empty($cources)) {
			$cources = NULL;
		}
		return response()->json($cources);
	}

	public function get_subjects( $courses_id )
	{
		$subjects = Subject::where('courses_id', $courses_id)->pluck('name', 'id');
		if (empty($subjects)) {
			$subjects = NULL;
		}
		return response()->json($subjects);
	}

	public function get_subjects_with_group( $courses_id )
	{
		$courses_id = explode(",", $courses_id);
		return $subjects = Course::whereIn('id', $courses_id)->get()->map(function ($role) {
            $users = $role->relSubjects->map(function($user) {
                return ['id' => $user->id, 'text' => $user->name];
            });
            return ['text' => $role->name, 'children' => $users];
        });

		if (empty($subjects)) {
			$subjects = NULL;
		}
		return response()->json($subjects);
	}
}
