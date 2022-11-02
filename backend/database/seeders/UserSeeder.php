<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User1',
            'email' => 'testuser1@email.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'subscribed' => '["Sports", "Finance"]',
            'channels' => '["SMS", "E-Mail"]'
        ]);

        DB::table('users')->insert([
            'name' => 'Test User2',
            'email' => 'testuser2@email.com',
            'password' => Hash::make('password'),
            'phone' => '1234567891',
            'subscribed' => '["Finance", "Movie"]',
            'channels' => '["E-Mail", "Push Notification"]'
        ]);

        DB::table('users')->insert([
            'name' => 'Test User3',
            'email' => 'testuser3@email.com',
            'password' => Hash::make('password'),
            'phone' => '1234567892',
            'subscribed' => '["Sports", "Finance", "Movie"]',
            'channels' => '["SMS", "E-Mail", "Push Notification"]'
        ]);
    }
}
