<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\City;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        return view('locations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities'] = City::pluck('name', 'id');
        return view('locations.create', $data);
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
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Location::create([
                'city_id' => $request->city_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Location create successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Location create failed!']);
        }
        return redirect()->route('locations.create');
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
        $data['cities'] = City::pluck('name', 'id');
        $data['location'] = Location::whereId($id)->first();
        return view('locations.edit', $data);
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
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'name' => ['required', 'string', 'max:100']
        ]);

        try {
            DB::beginTransaction();
            Location::whereId($id)->update([
                'city_id' => $request->city_id,
                'name' => $request->name,
            ]);
            DB::commit();
            session()->flash('message', ['success' => 'Location update successful!']);
        } catch (\PDOException $e) {
            DB::rollBack();
            session()->flash('message', ['error' => 'Location update failed!']);
        }
        return redirect()->route('locations.edit', $id);
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
