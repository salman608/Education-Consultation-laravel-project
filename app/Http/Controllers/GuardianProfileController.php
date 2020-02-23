<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GuardianProfile;
use Illuminate\Support\Facades\Storage;

class GuardianProfileController extends Controller
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
    public function upload_profile_photo()
    {
        $data['profile'] = GuardianProfile::where('user_id', auth()->user()->id)->first('photo');
        return view('profile.guardian.upload_profile_photo', $data);
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
            $image_name = 'guardian_'.time().'.'.explode('/', $file_type)[1];
            $path = storage_path() . "/upload/" . $image_name;
            file_put_contents($path, $filename);

            $previous_file_name = GuardianProfile::where('user_id', auth()->user()->id)->first('photo');
            GuardianProfile::where('user_id', auth()->user()->id)->update([
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
}
