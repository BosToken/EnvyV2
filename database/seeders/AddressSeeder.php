<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresss')->insert([
            'id' => '1',
            'user_id' => 1,
            'country' => 'Japanese',
            'province' => '北海道',
            'city' => '札幌市',
            'address' => '原子力発電所',
            'post' => 65154,
            'main' => 'Yes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('addresss')->insert([
            'id' => '2',
            'user_id' => 2,
            'country' => 'Indonesia',
            'province' => 'Jawa Timur',
            'city' => 'Malang',
            'address' => 'Jl.Pesona Wisnuwardana III No.6',
            'post' => 65154,
            'main' => 'Yes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('addresss')->insert([
            'id' => '3',
            'user_id' => 3,
            'country' => 'Indonesia',
            'province' => 'Jawa Timur',
            'city' => 'Malang',
            'address' => 'Jl.Pesona Wisnuwardana III No.6',
            'post' => 65154,
            'main' => 'Yes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
