<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'acc tự chọn',
            'slug' => 'acc-tu-chon',
        ]);
        DB::table('categories')->insert([
            'name' => 'acc random 50k',
            'slug' => 'acc-random-50k',
        ]);
        DB::table('categories')->insert([
            'name' => 'acc random 75k',
            'slug' => 'acc-random-75k',
        ]);
    }
}
