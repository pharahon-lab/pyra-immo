<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Team;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Team::factory()->create([
            'name' => 'Admin26',
            'user_id' =>User::factory()->create([
                'name' => 'Admin26',
                'nom' => 'SEREME',
                'prenoms' => 'Habib Seydou Laty',
                'phone' => '+2250151838383',
                'email' => 'pharahon@pharahon.com',
                'is_admin' => true,
                'is_staff' => true,
            ])
        ]);

    }
}
