<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Subject;
use App\Category;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = Subject::orderBy('id', 'desc')->get();
        return view('subjects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name', 'id');
        return view('subjects.create', $data);
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
            'courses_id' => ['required', 'numeric', 'exists:courses,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Subject::create([
                'courses_id' => $request->courses_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Subject create successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Subject create failed!']);
        }
        return redirect()->route('subjects.create');
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
        $subjects = Subject::whereId($id)->first();
        $data['categories'] = Category::pluck('name', 'id');
        $data['courses'] = Course::where('categories_id', $subjects->relCourse->categories_id)->pluck('name', 'id');
        $data['subject'] = $subjects;
        return view('subjects.edit', $data);
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
            'courses_id' => ['required', 'numeric', 'exists:courses,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Subject::whereId($id)->update([
                'courses_id' => $request->courses_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Subject update successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Subject update failed!']);
        }
        return redirect()->route('subjects.edit', $id);
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
