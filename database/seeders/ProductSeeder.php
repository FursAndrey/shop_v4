<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('products')->insert(
            [
                ['name_ru'=>'Майка', 'name_en'=>'T-shirt', 'category_id'=>1, 'description_ru'=>'Майка', 'description_en'=>'T-shirt', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Куртка', 'name_en'=>'Jacket', 'category_id'=>1, 'description_ru'=>'Куртка', 'description_en'=>'Jacket', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Толстовка', 'name_en'=>'Sweatshirt', 'category_id'=>1, 'description_ru'=>'Толстовка', 'description_en'=>'Sweatshirt', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Молоток', 'name_en'=>'Hammer', 'category_id'=>2, 'description_ru'=>'Молоток', 'description_en'=>'Hammer', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Пила', 'name_en'=>'Saw', 'category_id'=>2, 'description_ru'=>'Пила', 'description_en'=>'Saw', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Отвертка', 'name_en'=>'Screwdriver', 'category_id'=>2, 'description_ru'=>'Отвертка', 'description_en'=>'Screwdriver', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Брелок', 'name_en'=>'Trinket', 'category_id'=>3, 'description_ru'=>'Брелок', 'description_en'=>'Trinket', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name_ru'=>'Магнит', 'name_en'=>'Magnet', 'category_id'=>3, 'description_ru'=>'Магнит на холодильник', 'description_en'=>'Magnet for fridge', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
