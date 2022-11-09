<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
                ['code'=>'BYN', 'rate'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['code'=>'EUR', 'rate'=>2.35, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['code'=>'USD', 'rate'=>2.12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
