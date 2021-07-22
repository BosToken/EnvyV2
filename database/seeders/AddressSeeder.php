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
            'country' => 'Japanese',
            'province' => '北海道',
            'city' => '札幌市',
            'address' => '原子力発電所',
            'post' => '二万四千七百九十四',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('addresss')->insert([
            'id' => '2',
            'country' => 'Indonesia',
            'province' => 'Jawa Timur',
            'city' => 'Malang',
            'address' => 'Jl.Pesona Wisnuwardana III No.6',
            'post' => '65154',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}