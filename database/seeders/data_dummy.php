<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class data_dummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        {
            $userData =[
        
                [
                    'username' => 'badarmawan',
                    'password' => bcrypt('12345'),
                    'name' => 'bagus',
                    'role' => 'admin',
                ],
                [
                    'username' => 'bagusdarma',
                    'password' => bcrypt('12345'),
                    'name' => 'darmawan',
                    'role' => 'kasir',
                ],
                [
                    'username' => 'alvin',
                    'password' => bcrypt('12345'),
                    'name' => 'alvin',
                    'role' => 'kasir',
                ],
                [
                    'username' => 'maulana',
                    'password' => bcrypt('12345'),
                    'name' => 'maulana',
                    'role' => 'admin',
                ],
                [
                    'username' => 'nunki',
                    'password' => bcrypt('12345'),
                    'name' => 'nunki',
                    'role' => 'admin',
                ],
                [
                    'username' => 'veri',
                    'password' => bcrypt('12345'),
                    'name' => 'veri',
                    'role' => 'kasir',
                ]
     ];
                        foreach($userData as $key => $val){
                            User::create($val);
     }
        }
    }
}
