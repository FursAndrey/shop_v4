<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_sku')->insert(
            [
                ['option_id'=>1, 'sku_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>4, 'sku_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>6, 'sku_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>3, 'sku_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>1, 'sku_id'=>5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>4, 'sku_id'=>5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>6, 'sku_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>3, 'sku_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>1, 'sku_id'=>9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>4, 'sku_id'=>9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>6, 'sku_id'=>10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>2, 'sku_id'=>11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>3, 'sku_id'=>12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>10, 'sku_id'=>13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>12, 'sku_id'=>14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>14, 'sku_id'=>15, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>16, 'sku_id'=>16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>18, 'sku_id'=>17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>15, 'sku_id'=>18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>4, 'sku_id'=>19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>5, 'sku_id'=>20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>7, 'sku_id'=>21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['option_id'=>6, 'sku_id'=>22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['option_id'=>8, 'sku_id'=>23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
