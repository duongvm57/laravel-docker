<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'slug' => 'acc-1',
            'username' => 'garena1',
            'password' => 'garenanhucc',
            'value_account' => '1000 tỷ',
            'bp_available' => '9 tỷ',
            'price' => 500000,
            'price_after_sale' => 500000,
            'category_id' => 2,
            'linked_phone' => false,
            'linked_email' => false,
            'more' => 'Có mấy thằng cộng 8',
        ]);
        DB::table('products')->insert([
            'slug' => 'acc-2',
            'username' => 'garena2',
            'password' => 'garenanhucc',
            'value_account' => '2000 tỷ',
            'bp_available' => '9 tỷ',
            'price' => 900000,
            'price_after_sale' => 900000,
            'category_id' => 1,
            'linked_phone' => false,
            'linked_email' => false,
            'more' => 'Có mấy thằng cộng 9',
        ]);
        DB::table('products')->insert([
            'slug' => 'acc-3',
            'username' => 'garena3',
            'password' => 'garenanhucc',
            'value_account' => '3000 tỷ',
            'bp_available' => '9 tỷ',
            'price' => 9000000,
            'price_after_sale' => 9000000,
            'category_id' => 1,
            'linked_phone' => false,
            'linked_email' => false,
            'more' => 'Có 1 thằng cộng 10',
        ]);
    }
}
