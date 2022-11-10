<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skus')->insert(
            [
                ['price'=>12.5, 'count'=>15, 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>13.5, 'count'=>15, 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>11.5, 'count'=>15, 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>15.5, 'count'=>15, 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>45.5, 'count'=>15, 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>44.5, 'count'=>15, 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>42.5, 'count'=>15, 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>46.5, 'count'=>15, 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>22.5, 'count'=>15, 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>24.5, 'count'=>15, 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>23.5, 'count'=>15, 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>26.5, 'count'=>15, 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>10.5, 'count'=>15, 'product_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>15.5, 'count'=>15, 'product_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>20.5, 'count'=>15, 'product_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>10.5, 'count'=>15, 'product_id'=>5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>11.5, 'count'=>15, 'product_id'=>5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>12.5, 'count'=>15, 'product_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>2.5, 'count'=>15, 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>2.5, 'count'=>15, 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>2.5, 'count'=>15, 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

                ['price'=>5.5, 'count'=>15, 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['price'=>5.5, 'count'=>15, 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
