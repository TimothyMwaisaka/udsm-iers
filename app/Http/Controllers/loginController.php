<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class loginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request){
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])){
            $user = User::where('username', $request->username)->first();
            if($user->is_admin()){
                return redirect()->route('dashboard');
            }
            return redirect()->route('student');
        }
        return redirect()->route('admin');
    }
}
