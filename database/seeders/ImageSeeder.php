<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                ['file'=>'1.jpg', 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'2.jpg', 'product_id'=>1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'3.jpg', 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'4.jpg', 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'5.png', 'product_id'=>2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'6.jpg', 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'7.jpg', 'product_id'=>3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'8.jpg', 'product_id'=>4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'9.jpg', 'product_id'=>5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'10.jpg', 'product_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'11.jpg', 'product_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'12.jpg', 'product_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'13.jpg', 'product_id'=>6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'14.jpg', 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'15.jpg', 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'16.jpg', 'product_id'=>7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'17.jpg', 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'18.jpg', 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'19.jpg', 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['file'=>'20.jpg', 'product_id'=>8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ]
        );
    }
}
