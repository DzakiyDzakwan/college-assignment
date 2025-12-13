<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;

class checkProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $nik = auth()->user()->NIK;
        $role = auth()->user()->status;

        if($role === 'mahasiswa') {

            $profil = Mahasiswa::where('user', $nik)->exists();
        } elseif($role === 'dosen') {
            $profil = Dosen::where('user', $nik)->exists();
        }

        if(!$profil) {
            Auth::logout();
 
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/')->with('loginError', 'Profil Tidak ada harap bersabar');
        }
        
        return $next($request);
    }
}
