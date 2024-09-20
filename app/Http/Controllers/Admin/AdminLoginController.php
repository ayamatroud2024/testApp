<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(AuthRequest $request){

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withInput()->withErrors(['email' => __('Invalid credentials')]);
        }


        return redirect()->route('admin.dashboard');


    }

    public function logout(Request $request){


        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login-page')->with(['success' => __('Logged out successfully')]);
    }

}
