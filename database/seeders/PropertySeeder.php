<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert(
            [
                ['name_ru'=>'Размер одежды', 'name_en'=>'Size of clothes', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Цвет', 'name_en'=>'Color', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Масса', 'name_en'=>'Weight', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Длинна', 'name_en'=>'Lenght', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
