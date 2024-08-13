<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hierarchies = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'User', 'slug' => 'user'],
        ];

        foreach ($hierarchies as $hierarchy) {

            $exists = \App\Models\Hierarchy::where('name', $hierarchy['name'])->first();

            if (!$exists) {
                \App\Models\Hierarchy::create([
                    'name' => $hierarchy['name'],
                    'slug' => Str::kebab($hierarchy['name']),
                ]);
            }

        }
    }
}
