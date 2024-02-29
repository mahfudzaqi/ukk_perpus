<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'administrator'){
                return redirect('/administrator');
            }elseif(Auth::user()->role == 'petugas'){
                return redirect('/petugas');
            }elseif(Auth::user()->role == 'peminjam'){
                return redirect('/peminjam');
            }
        }else {
            return redirect('')->with('Email atau Password yang dimasukkan tidak sesuai')->withInput();
        }

    }

    function logout() {
        Auth::logout();
        return redirect('');
    }

}
