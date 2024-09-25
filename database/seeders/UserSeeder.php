<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = [
            "name" => "Administrator",
            "email" => "admin@admin.com",
            "password" => Hash::make('123'),
            "level" => 'Administrator',
        ];
        User::create($user);
    }
}
