<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Category;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['courses'] = Course::orderBy('id', 'desc')->get();
        return view('courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name', 'id');
        return view('courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'categories_id' => ['required', 'numeric', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Course::create([
                'categories_id' => $request->categories_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Course create successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Course create failed!']);
        }
        return redirect()->route('courses.create');
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
        $data['categories'] = Category::pluck('name', 'id');
        $data['course'] = Course::whereId($id)->first();
        return view('courses.edit', $data);
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
        $validator = $request->validate([
            'categories_id' => ['required', 'numeric', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Course::whereId($id)->update([
                'categories_id' => $request->categories_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Course update successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Course update failed!']);
        }
        return redirect()->route('courses.edit', $id);
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
