<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name'=>'Admin', 
                    'email'=>'admin@admin.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('admin@admin.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
            ]
        );
    }
}
