<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GrafikRekapController extends Controller
{
    public function rekaptulasi($role,$nama){
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        
        //Hari
        $hari1 = DB::table('rekaptulasis')
                    ->whereDay('created_at', $day)
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->get();
        
        //Bulan
        $bula = DB::table('rekaptulasis')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->get();
        
        //hari
        $tahun = DB::table('rekaptulasis')
                    ->whereYear('created_at', $year)
                    ->get();
                    
        // Pengisian data menggunakan loop for tahun
        for ($i = 0; $i <4; $i++) {
                // Menyiapkan data untuk disimpan dalam array
                        //tahun
                $tahun = DB::table('rekaptulasis')
                        ->whereYear('created_at', $year-$i)
                        ->get();
    
                $products = json_decode($tahun, true);
    
                // Buat koleksi dari array produk
                $collection = collect($products);
                
                // Hitung total total dari semua produk
                $totalPrice = $collection->sum('total');
                // Menambahkan array $produk ke dalam $data_array
                $data_array[] = $totalPrice;
        }
                    
                // Menampilkan isi dari $data_array
          

        for ($i = 0; $i <7; $i++) {
                    // Menyiapkan data untuk disimpan dalam array
                            //tahun
                    $hari = DB::table('rekaptulasis')
                            ->whereDay('created_at', $day-$i)
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)
                            ->get();
        
                    $products = json_decode($hari, true);
        
                    // Buat koleksi dari array produk
                    $collection = collect($products);
                    
                    // Hitung total total dari semua produk
                    $totalPrice = $collection->sum('total');
                    // Menambahkan array $produk ke dalam $data_array
                    $data_array1[] = $totalPrice;
        }
                        
                    for ($i = 0; $i < 12; $i++) {
                        // Menyiapkan bulan dan tahun yang akan dihitung
                        $currentMonth = $month - $i;
                        $currentYear = $year;
                    
                        // Jika bulan kurang dari 1, maka kita mengurangi tahun dan menambahkan 12 ke bulan
                        if ($currentMonth < 1) {
                            $currentYear--;
                            $currentMonth += 12;
                        }
                    
                        // Mengambil data dari database
                        $hari = DB::table('rekaptulasis')
                                ->whereMonth('created_at', $currentMonth)
                                ->whereYear('created_at', $currentYear)
                                ->get();
                    
                        $products = json_decode($hari, true);
                    
                        // Buat koleksi dari array produk
                        $collection = collect($products);
                    
                        // Hitung total dari semua produk
                        $totalPrice = $collection->sum('total');
                    
                        // Menambahkan total ke dalam array
                        $data_array2[] = $totalPrice;
                    }
                    
             
                    
                

        return view('rekaptulasi', ['role'=>$role,'nama'=>$nama,'hari' => $data_array1,'bulan' => $data_array2 ,'tahun' => $data_array]);
    }
}
