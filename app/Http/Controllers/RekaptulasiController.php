<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekaptulasi;
use App\Models\Produk;

class RekaptulasiController extends Controller
{
    public function store(Request $request)
    {
        $total = 0;
        $harga = $request->input('harga');
        $jumlah = $request->input('jumlah');
        $produk_ids = $request->input('produk_id');
        $nama_produk = $request->input('nama_produk');

        for ($i = 0; $i < count($harga); $i++) {
            $total += $harga[$i] * $jumlah[$i];
            // Reduce stock
            $produk = Produk::find($produk_ids[$i]);
            if ($produk && $jumlah[$i] > 0) {
                $produk->stock -= $jumlah[$i];
                $produk->save();
            }
            if($harga[$i]*$jumlah[$i]!=0){
                $data_array2[] = $nama_produk[$i];
                $data_array3[] = $jumlah[$i];
                $data_array4[] = $harga[$i];
            }
        }


        // Save total to rekaptulasi
        $rekap = new Rekaptulasi();
        $rekap->total = $total;
        $rekap->save();
        return view('kwitansi',['total'=>$total,'nama_produk'=>$data_array2,'jumlah'=>$data_array3,'harga'=>$data_array4]);
    }
}