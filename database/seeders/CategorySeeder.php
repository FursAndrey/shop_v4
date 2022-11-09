<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                ['name_ru'=>'Одежда', 'name_en'=>'Clothes', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Инструменты', 'name_en'=>'Tools', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Сувениры', 'name_en'=>'Souvenirs', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
