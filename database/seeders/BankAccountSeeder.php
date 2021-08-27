<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_accounts')->insert([
            'id' => '1',
            'user_id' => 1,
            'bank_name_id' => 5,
            'account_name' => 'Faiz Diandra Maulana',
            'account_number' => '706274147700',
            // 'main' => 'Yes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_accounts')->insert([
            'id' => '2',
            'user_id' => 1,
            'bank_name_id' => 1,
            'account_name' => 'Faiz Diandra Maulana',
            'account_number' => '706274147711',
            // 'main' => 'No',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
