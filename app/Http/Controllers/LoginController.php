<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request){
        // dd($request);
        //untuk validasi menggunakan ekstension laravel blade snipet
    $request->validate([
        "username"=> "required",
        "password"=> "required",
    ],
    [
        'username.required'=>'Username wajib diisi',
        'password.required'=> 'Password Wajib diisi',
    ]
    );
        //<--chek nama dan password dari database-->
    $infologin=[
        'username'=> $request->username,
        'password'=> $request->password
    ];
$pass =$request->password;
$usern =$request->username;
    //$ php artisan make:model Employee -mc
    if(Auth::attempt($infologin)){
        $user = Auth::user(); // Mendapatkan objek User yang sedang login
        $nama=$user->name;
        $role=$user->role;
            return view('dashboard',['nama'=>$nama,'role'=>$role]);     

    }else{
        //mengembalikan ke halaman login
        return redirect('')->withErrors(['Username dan password salah'])->withInput();
    }
}

function logout(){
    Auth::logout();
    return redirect('');
}
}
