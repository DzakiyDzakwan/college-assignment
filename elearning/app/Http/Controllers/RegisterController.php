<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){

        return view('user.register', [
            'title' => "Register"
        ]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NIK' => 'required|min:1|max:16|unique:users',
            'email' => 'required|email:dns|unique:users',
            'nomor_hp' => 'required|min:8|max:255|unique:users',
            'jenis_kelamin' => 'required',
            'first_name' => 'required|min:3|max:200',
            'last_name' => 'required|min:3|max:200',
            'agama' => 'required|min:5|max:255',
            'kewarganegaraan' => 'required',
            'alamat' => 'required|min:1|max:255',
            'tgl_lahir' => 'required',
            'password' => 'required|min:5|max:255',
            'status' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'Account created Successfully!');
    }
}
