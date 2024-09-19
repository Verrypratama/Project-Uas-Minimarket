<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class data_produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $userData =[
        
                [
                    'nama_produk' => 'Aqua',
                    'stock' => 100,
                    'harga' => 3000,
                ],
                [
                    'nama_produk' => 'Sun Light',
                    'stock' => 100,
                    'harga' => 3000,
                ],
                [
                    'nama_produk' => 'Ultra Mimi',
                    'stock' => 100,
                    'harga' => 3000,
                ],
                [
                    'nama_produk' => 'Yakult',
                    'stock' => 100,
                    'harga' => 3000,
                ],
                [
                    'nama_produk' => 'Green Tea',
                    'stock' => 100,
                    'harga' => 3000,
                ],
                [
                    'nama_produk' => 'Cleo',
                    'stock' => 100,
                    'harga' => 3000,
                ]
     ];
                        foreach($userData as $key => $val){
                            produk::create($val);
     }
        }
    }
}
