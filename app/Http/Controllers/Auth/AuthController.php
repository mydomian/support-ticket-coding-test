<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // admin login
    public function admin_login(Request $request){
        if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'admin'])) {
                return redirect()->route('admin.tickets')->with('message','Login Successfully');
            }else{
                return redirect()->route('admin.login')->with('error','Invalid Creadentials!');
            }
        }
        return view('auth.admin_login');
    }

    // user login
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $newUser = User::create([
                    'name' => explode('@', $request->email)[0],
                    'email'   => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>'user'])) {
                return redirect()->route('tickets.index')->with('message','Login Successfully');
            }else{
                return redirect()->route('login')->with('error','Invalid Creadentials!');
            }
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('error', 'Logout Successfully');
    }

    public function admin_logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('error', 'Logout Successfully');
    }
}
