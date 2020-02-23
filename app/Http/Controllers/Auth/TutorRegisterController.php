<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\TutorProfile;
use App\City;
use App\TpEducational;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TutorRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /*use RegistersUsers;*/

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:tutor_profiles'],
            'parents_type' => ['required', 'string', 'in:father,mother'],
            'parents_mobile_no' => ['required', 'string', 'min:11', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'locations_id' => ['required', 'numeric', 'exists:locations,id'],
            'institute_name' => ['required', 'string'],
            'current_year' => ['required', 'string', 'in:1st Year,2nd Year,3rd Year,Final Year,Completed'],
            'subject' => ['required', 'string'],
            'facebook_link' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'tutor',
            ]);

            $father_mobile_no = NULL;
            $mother_mobile_no = NULL;
            if ($request->parents_type == 'father') {
                $father_mobile_no = $request->parents_mobile_no;
            }
            if ($request->parents_type == 'mother') {
                $mother_mobile_no = $request->parents_mobile_no;
            }

            TutorProfile::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'father_mobile_no' => $father_mobile_no,
                'mother_mobile_no' => $mother_mobile_no,
                'city_id' => $request->city_id,
                'locations_id' => $request->locations_id,
                'facebook_link' => $request->facebook_link,
            ]);

            TpEducational::create([
                'user_id' => $user->id,
                'group_name' => $request->subject,
                'institute_name' => $request->institute_name,
                'current_year' => $request->current_year,
            ]);

            DB::commit();

            $this->guard()->login($user);
            return $this->registered($request, $user) ?: redirect($this->redirectPath());
            
            return response()->json(['success' => 'Registration successful!'], 200);

        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => 'Registration failed!'], 400);
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function showRegistrationForm()
    {
        $data['cities'] = City::pluck('name', 'id');
        return view('auth.tutor_register', $data);
    }
}
