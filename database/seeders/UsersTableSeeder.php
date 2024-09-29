<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('12345'), //パスワードをハッシュ化
                'bio' => 'This is user1 bio',
                'icon_image' => 'icon1.png',
            ],
            [
                'username' => 'user2',
                'email' => 'user2@example.com',
                'password' => Hash::make('23456'), //パスワードをハッシュ化
                'bio' => 'This is user2 bio',
                'icon_image' => 'icon2.png',
            ],
            [
                'username' => 'user3',
                'email' => 'user3@example.com',
                'password' => Hash::make('34567'), //パスワードをハッシュ化
                'bio' => 'This is user3 bio',
                'icon_image' => 'icon3.png',
            ],
        ]);

    }
}
