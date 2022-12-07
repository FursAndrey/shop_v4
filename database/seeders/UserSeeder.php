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
                [
                    'name'=>'user1', 
                    'email'=>'user1@user.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('user1@user.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'name'=>'user2', 
                    'email'=>'user2@user.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('user2@user.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'name'=>'seller1', 
                    'email'=>'seller1@seller.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('seller1@seller.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'name'=>'seller2', 
                    'email'=>'seller2@seller.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('seller2@seller.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'name'=>'seller3', 
                    'email'=>'seller3@seller.com', 
                    'email_verified_at'=>Carbon::now(), 
                    'password'=>bcrypt('seller3@seller.com'), 
                    'remember_token' => Str::random(10),
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
            ]
        );
        
        DB::table('roles')->insert(
            [
                [
                    'name_ru'=>'Админ', 
                    'name_en'=>'Admin', 
                    'description_ru'=>'Администратор сайта', 
                    'description_en'=>'Admin of this shop',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'name_ru'=>'Продавец', 
                    'name_en'=>'Seller', 
                    'description_ru'=>'Продавец на сайте', 
                    'description_en'=>'Seller of this shop',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
            ]
        );
        
        DB::table('role_user')->insert(
            [
                [
                    'role_id'=>'1', 
                    'user_id'=>'1',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'role_id'=>'2', 
                    'user_id'=>'4',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'role_id'=>'2', 
                    'user_id'=>'5',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
                [
                    'role_id'=>'2', 
                    'user_id'=>'6',
                    'created_at'=>Carbon::now(), 
                    'updated_at'=>Carbon::now()
                ],
            ]
        );
    }
}
