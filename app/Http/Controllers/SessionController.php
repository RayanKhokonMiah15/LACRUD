<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/index');
    }
    public function login (Request $request){
        Session::flash('email', $request->email);


        $request->validate ([
            'email' => 'required',
            'password' => 'required',
        ]);
        [
            'email'=>'wajib Diisi',
            'password'=>'wajib Diisi',
        ];

        $infologin = [
            'email' => $request->email,
            'password' =>$request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('departemen')->with('success', 'berhasil login');
        } else {
            return redirect('sesi')->with('success', 'username dan password yang di masukan tidak valid');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('sesi')->with('success', 'berhasil Logout');
    }
}
