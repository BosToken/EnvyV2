<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => '1',

            // app
            'title_app' => 'AppTitle',
            'lang_app' => 'eng',
            'image_app' => 'ico.png',

            // contact
            'email_app' => 'faizdiandra11@gmail.com',
            'instagram_app' => 'puckxou',
            'whatsapp_app' => '81232857502',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
