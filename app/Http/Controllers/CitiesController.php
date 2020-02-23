<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\City;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cities'] = City::orderBy('id', 'desc')->get();
        return view('cities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
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
            'name' => ['required', 'string', 'max:100', 'unique:cities']
        ]);

        try {
            DB::beginTransaction();
            City::create([
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'City create successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'City create failed!']);
        }
        return redirect()->route('cities.create');
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
        $data['city'] = City::whereId($id)->first();
        return view('cities.edit', $data);
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
            'name' => ['required', 'string', 'max:100', 'unique:cities,name,'.$id]
        ]);

        try {
            DB::beginTransaction();
            City::whereId($id)->update([
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'City update successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'City update failed!']);
        }
        return redirect()->route('cities.edit', $id);
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
