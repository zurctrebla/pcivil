<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = [
            ['name' => 'Albert', 'register' => '151515', 'password' => 'agent']
        ];

        foreach ($agents as $agent) {

            $exists = \App\Models\Agent::where('register', $agent['register'])->first();

            if (!$exists) {

                $hierarchy = \App\Models\Hierarchy::first();

                $hierarchy->agent()->create([
                    'name' => $agent['name'],
                    'register' => $agent['register'],
                    'password' => bcrypt($agent['password']),
                ]);
            }

        }
    }
}
