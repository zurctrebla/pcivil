<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Albert', 'email' => 'arc.albert.cruz@gmail.com', 'password' => '123456'],
        ];

        foreach ($users as $user) {

            $exists = \App\Models\User::where('name', $user['name'])->first();

            if (!$exists) {
                \App\Models\User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                ]);
            }

        }
    }
}
