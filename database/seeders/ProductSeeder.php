<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => '1',
            'name_product' => 'Baju Tidur',
            'description_product' => 'baju tidur dengan kualitas distro yang membuat tidur anda bermimpi buruk',
            'image_product' => 'bajutidur.jpg',
            'quantity_product' => 100,
            'price_product' => 100000,
            'gender_id' => 2,
            'type_id' => 1,
            'size' => 'M',
            'color' => 'Blue',
            'archive' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'id' => '2',
            'name_product' => 'Hoodie abu-abu',
            'description_product' => 'hoodie stylish cocok dipakai untuk musim dingin',
            'image_product' => 'hoodie1.jpg',
            'quantity_product' => 80,
            'price_product' => 175000,
            'gender_id' => 1,
            'type_id' => 2,
            'size' => 'L',
            'color' => 'Grey',
            'archive' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'id' => '3',
            'name_product' => 'Hoodie hitam pria',
            'description_product' => 'hoodie hitam pekat mengintimidasi',
            'image_product' => 'hoodie2.jpg',
            'quantity_product' => 120,
            'price_product' => 125000,
            'gender_id' => 1,
            'type_id' => 2,
            'size' => 'L',
            'color' => 'Black',
            'archive' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'id' => '4',
            'name_product' => 'Tshirt Hitam',
            'description_product' => 'tshirt yang nyaman untuk dipakai kemana-mana',
            'image_product' => 'tshirt1.jpg',
            'quantity_product' => 0,
            'price_product' => 100000,
            'gender_id' => 1,
            'type_id' => 3,
            'size' => 'S',
            'color' => 'Black',
            'archive' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'id' => '5',
            'name_product' => 'Tshirt Wanita',
            'description_product' => 'tshirt yang nyaman untuk dipakai kemana-mana',
            'image_product' => 'tshirt2.jpg',
            'quantity_product' => 50,
            'price_product' => 100000,
            'gender_id' => 2,
            'type_id' => 3,
            'size' => 'S',
            'color' => 'White',
            'archive' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
