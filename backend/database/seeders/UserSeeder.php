<?php

namespace Database\Seeders;

use App\Enums\MessageType;
use App\Enums\NotificationType;
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
            'subscribed' => json_encode([MessageType::Sports, MessageType::Finance]),
            'channels' => json_encode([NotificationType::SMS, NotificationType::Email])
        ]);

        DB::table('users')->insert([
            'name' => 'Test User2',
            'email' => 'testuser2@email.com',
            'password' => Hash::make('password'),
            'phone' => '1234567891',
            'subscribed' => json_encode([MessageType::Finance, MessageType::Movies]),
            'channels' => json_encode([NotificationType::Email, NotificationType::Push])
        ]);

        DB::table('users')->insert([
            'name' => 'Test User3',
            'email' => 'testuser3@email.com',
            'password' => Hash::make('password'),
            'phone' => '1234567892',
            'subscribed' => json_encode([MessageType::Sports, MessageType::Finance, MessageType::Movies]),
            'channels' => json_encode([NotificationType::SMS, NotificationType::Email, NotificationType::Push])
        ]);
    }
}
