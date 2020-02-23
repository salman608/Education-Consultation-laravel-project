<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => ['required', 'string', 'max:100', 'unique:categories']
        ]);

        try {
            DB::beginTransaction();
            Category::create([
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Category create successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Category create failed!']);
        }
        return redirect()->route('categories.create');
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
        $data['category'] = Category::whereId($id)->first();
        return view('categories.edit', $data);
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
            'name' => ['required', 'string', 'max:100', 'unique:categories,name,'.$id]
        ]);

        try {
            DB::beginTransaction();
            Category::whereId($id)->update([
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Category update successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Category update failed!']);
        }
        return redirect()->route('categories.edit', $id);
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
