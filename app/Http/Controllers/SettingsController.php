<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function change_password()
    {
        return view('settings.change_password');
    }

    public function update_password(Request $request)
    {
    	$validator = $request->validate([
            'current_password' => 'required|min:8',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    	$user = User::find(auth()->user()->id);

        if (Hash::check($request->input('current_password'), $user->password)) { 
			$user->fill([
				'password' => Hash::make($request->input('password'))
			])->save();
			session()->flash('message', ['success' => 'Password changed']);
		} else {
			session()->flash('message', ['error' => 'Current Password does not match']);
		}
		return redirect()->route('password.change');
    }

    public function soft_delete_users()
    {
        try {
            DB::beginTransaction();
                User::whereNull('deleted_at')->delete();
            DB::commit();
            return response()->json(['success' => 'All User Soft Deleted'], 200);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json(['error' => $e], 400);
        }
    }
}
