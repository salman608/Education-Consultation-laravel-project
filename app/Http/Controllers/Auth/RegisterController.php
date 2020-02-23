<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\GuardianProfile;
use App\Jobboard;
use App\JbSubject;
use App\City;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
        $messages = [
            'subjects_id.*' => 'The selected subjects id is invalid.'
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:guardian_profiles'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'hear_about_us' => ['required', 'string'],
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
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            DB::beginTransaction();
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'guardian',
            ]);

            GuardianProfile::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'hear_about_us' => $request->hear_about_us,
            ]);

            $jobboard = Jobboard::create([
                'user_id' => $user->id,
                'categories_id' => $request->categories_id,
                'courses_id' => $request->courses_id,
                'curriculum' => $request->curriculum,
                'subjects_id' => $request->subjects_id,
                'city_id' => $request->city_id,
                'locations_id' => $request->locations_id,
                'salary' => $request->salary,
                'no_of_students' => $request->no_of_students,
                'institute_name' => $request->institute_name,
                'student_gender' => $request->student_gender,
                'peferred_gender' => $request->peferred_gender,
                'tutoring_time' => $request->tutoring_time,
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
        $data['categories'] = Category::pluck('name', 'id');
        $data['cities'] = City::pluck('name', 'id');
        return view('auth.register', $data);
    }
}
