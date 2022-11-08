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
        DB::table('categories')->insert(
            [
                ['name_ru'=>'Одежда', 'name_en'=>'Clothes'],
                ['name_ru'=>'Инструменты', 'name_en'=>'Tools'],
                ['name_ru'=>'Сувениры', 'name_en'=>'Souvenirs'],
            ]
        );
    }
}
