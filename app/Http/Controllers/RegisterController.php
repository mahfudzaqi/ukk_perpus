<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    function index() {
        return view("register");
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'namalengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'alamat' => 'required',
        ],[
            'name.required' => 'Name wajib di isi',
            'namalengkap.required' => 'Namalengkap wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Isi email yang valid',
            'email.unique' => 'Email sudah digunakan, silahkan gunakan email lain',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password harus 6 karakter atau lebih',
            'alamat.required' => 'Alamat wajib di isi'
        ]);
    
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $user = new User();
        $user->name = $request->name;
        $user->namalengkap = $request->namalengkap;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->input('role');
        $user->alamat = $request->alamat;
    
    
        $user->save();
    
       
    
        return redirect('/');

    }
}
