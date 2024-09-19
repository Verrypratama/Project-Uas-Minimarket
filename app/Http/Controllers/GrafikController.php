<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RekaptulasiController extends Controller
{
    public function rekaptulasi($role,$nama){
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $data = transaksi::all();
        
        //Hari
        $hari1 = DB::table('produks')
                    ->whereDay('created_at', $day)
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->get();
        
        //Bulan
        $bula = DB::table('produks')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->get();
        
        //hari
        $tahun = DB::table('produks')
                    ->whereYear('created_at', $year)
                    ->get();
                    
        // Pengisian data menggunakan loop for tahun
        for ($i = 0; $i <4; $i++) {
                // Menyiapkan data untuk disimpan dalam array
                        //tahun
                $tahun = DB::table('produks')
                        ->whereYear('created_at', $year-$i)
                        ->get();
    
                $products = json_decode($tahun, true);
    
                // Buat koleksi dari array produk
                $collection = collect($products);
                
                // Hitung total harga dari semua produk
                $totalPrice = $collection->sum('harga');
                // Menambahkan array $produk ke dalam $data_array
                $data_array[] = $totalPrice;
        }
                    
                // Menampilkan isi dari $data_array
                // echo "Total penjualan dari 4 Tahun terakhir\n";
                // print_r($data_array);

        for ($i = 0; $i <7; $i++) {
                    // Menyiapkan data untuk disimpan dalam array
                            //tahun
                    $hari = DB::table('produks')
                            ->whereDay('created_at', $day-$i)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)
                            ->get();
        
                    $products = json_decode($hari, true);
        
                    // Buat koleksi dari array produk
                    $collection = collect($products);
                    
                    // Hitung total harga dari semua produk
                    $totalPrice = $collection->sum('harga');
                    // Menambahkan array $produk ke dalam $data_array
                    $data_array1[] = $totalPrice;
        }
                        
                    // Menampilkan isi dari $data_array
                    
                    // echo "<br>";
                    // echo "<br>";
                    // echo "Total penjualan dari 7 hari terakhir\n";
                    // print_r($data_array1);
        for ($i = 0; $i <12; $i++) {
                        // Menyiapkan data untuk disimpan dalam array
                        //tahun
                        $hari = DB::table('produks')
                                ->whereMonth('created_at', $month-$i)
                                ->whereYear('created_at', $year)
                                ->get();
            
                        $products = json_decode($hari, true);
            
                        // Buat koleksi dari array produk
                        $collection = collect($products);
                        
                        // Hitung total harga dari semua produk
                        $totalPrice = $collection->sum('harga');
                        // Menambahkan array $produk ke dalam $data_array
                        $data_array2[] = $totalPrice;
        }
                            
                        // Menampilkan isi dari $data_array
                        
                        // echo "<br>";
                        // echo "<br>";
                        // echo "Total penjualan dari 12 Bulan: terakhir\n";
                        // print_r($data_array2);

        return view('rekaptulasi', ['role'=>$role,'nama'=>$nama,'hari' => $data_array1,'bulan' => $data_array2 ,'tahun' => $data_array]);
    }
}
