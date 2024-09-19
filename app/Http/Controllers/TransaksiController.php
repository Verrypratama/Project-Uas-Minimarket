<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\produk;

class TransaksiController extends Controller
{
    // Read
    public function dashboard($role,$nama){

        $data= transaksi::all();
        return view('dashboard',['role'=>$role,'nama'=>$nama ,'data'=>$data]);
     
    }

    public function transaksi($role,$nama){

        $data= produk::all();
        return view('transaksi',['role'=>$role,'nama'=>$nama ,'data'=>$data]);
     
    }

    

}
