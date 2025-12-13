<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class LoginController extends Controller
{
    public function login(){

        return view('user.index', [
            'title' => "Login"
        ]);

}

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            //return redirect()->intended('/testadmin');

            if(Auth::user()->status === "mahasiswa" || Auth::user()->status === "dosen") {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/admin');
            }

            
        }

        return back()->with('loginError', 'Login Gagal Bro, ntnt bisa comeback');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
