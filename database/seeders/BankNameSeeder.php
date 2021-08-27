<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_names')->insert([
            'id' => '1',
            'company_bank' => 'PT. BANK MANDIRI',
            'name_bank' => 'BANK MANDIRI',
            'image_bank' => 'Mandiri.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '2',
            'company_bank' => 'PT. BCA (Bank Centra Asia)',
            'name_bank' => 'BANK BCA',
            'image_bank' => 'BankCentralAsia.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '3',
            'company_bank' => 'PT. BANK NEGARA INDONESIA (BNI)(PERSERO)',
            'name_bank' => 'BANK BNI',
            'image_bank' => 'BankNegaraIndonesia.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '4',
            'company_bank' => 'PT. BANK TABUNGAN NEGARA (BTN)(PERSERO)',
            'name_bank' => 'BANK BTN',
            'image_bank' => 'BankTabunganNegara.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '5',
            'company_bank' => 'PT. BANK CIMB NIAGA TBK',
            'name_bank' => 'BANK CIMB',
            'image_bank' => 'CimbNiaga.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '6',
            'company_bank' => 'PT. BANK INDONESIA',
            'name_bank' => 'BANK INDONESIA',
            'image_bank' => 'BankIndonesia.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bank_names')->insert([
            'id' => '7',
            'company_bank' => 'PT. BANK RAKYAT INDONESIA (BRI)(PERSERO)',
            'name_bank' => 'BANK BRI',
            'image_bank' => 'BankRakyatIndonesia.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
