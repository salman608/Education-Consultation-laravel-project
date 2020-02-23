<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login_tutor(Request $request)
    {
        $this->validateLogin($request);

        $exists = User::where(['email' => $request->email, 'role' => 'tutor'])->first();
        if (empty($exists)) {
            return response()->json(['error' => 'Your account not found!'], 400);
        }
        if (Hash::check($request->password, $exists->password)) {
            if ($this->attemptLogin($request)) {
                $this->sendLoginResponse($request);
                return response()->json(['success' => 'Login successful!'], 200);
            }
        }
        return response()->json(['error' => 'Login failed!'], 400);
    }
}
