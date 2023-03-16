<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('petugas')->check()) {
            return abort(404);
        }
        elseif(Auth::guard('masyarakat')->check()){
            return redirect()->intended('/dashboard');
        }
        else{
            return view('user.login.index');
        }
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Anda Berhasil Login! Silahkan Isi Pengaduan Anda.');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
