<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AbonnementType;
use App\Models\City;
use App\Models\Communes;
use App\Models\Country;
use App\Models\PassType;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        $countr = [
            'Burkina Faso',
            'Côte d\'Ivoire',
          ];

        $citbf = [
            'Ouagadougou',
            'Bobo Dioulasso',
          ];
        $citci = [
            'Abidjan',
            'Gran Bassam',
          ];

        $comm_abj = [
            'Abobo',
            'Adjamé',
            'Anyama',
            'Attécoubé',
            'Bingerville',
            'Cocody',
            'Koumassi',
            'Marcory',
            'Plateau',
            'Port bouët',
            'Treichville',
            'Songon',
            'Yopougon',
          ];

        
        $abbType = [
            [
            'title' => 'Basic',
            'pourcentage_demarcheur' => 10,
            'type' => 'personal',
            'price' => '5000',
            ],
            [
                'title' => 'Medium',
                'pourcentage_demarcheur' => 18,
                'type' => 'personal',
                'price' => '15000',
            ],
            [
                'title' => 'Premium',
                'pourcentage_demarcheur' => 25,
                'type' => 'personal',
                'price' => '30000',
            ],
            [
            'title' => 'silver',
            'pourcentage_demarcheur' => 25,
            'type' => 'company',
            'price' => '50000',
            ],
            [
            'title' => 'gold',
            'pourcentage_demarcheur' => 25,
            'type' => 'company',
            'price' => '75000',
            ],
            [
            'title' => 'Black',
            'pourcentage_demarcheur' => 25,
            'type' => 'company',
            'price' => '150000',
            ],

          ];

        $passType = [
            [
                'name' => 'Pass 5 maisons',
                'nb_visite' => 5,
                'price' => '2000',
            ],
            [
                'name' => 'Pass 10 maisons',
                'nb_visite' => 10,
                'price' => '3000',
            ],
            [
                'name' => 'Pass 20 maisons',
                'nb_visite' => 20,
                'price' => '5000',
            ],
        ];


        Team::factory()->create([
            'name' => 'Admin26',
            'user_id' => User::factory()->create([
                'name' => 'Admin26',
                'nom' => 'SEREME',
                'prenoms' => 'Habib Seydou Laty',
                'phone' => '+2250151838383',
                'email' => 'pharahon@pharahon.com',
                'is_admin' => true,
                'is_staff' => true,
            ])
        ]);

        // Country::factory()->count(2)->sequence(
        //     fn (Sequence $sequence) => ['name' => $countr[$sequence->index]]
        // )->create();
        

        City::factory()->count(2)->sequence(
            fn (Sequence $sequence) => ['name' => $citci[$sequence->index]]
        )->forCountry([
            'name' => 'Côte d\'Ivoire',
        ])->create();

        
        City::factory()->count(2)->sequence(
            fn (Sequence $sequence) => ['name' => $citbf[$sequence->index]]
        )->forCountry([
            'name' => 'Burkina Faso',
        ])->create();

        Communes::factory()->count(13)->sequence(
            fn (Sequence $sequence) => ['name' => $comm_abj[$sequence->index], 'city_id' => 1]
        )->create();

        AbonnementType::factory()->count(6)->sequence(
            fn (Sequence $sequence) => $abbType[$sequence->index]
        )->create();

        PassType::factory()->count(3)->sequence(
            fn (Sequence $sequence) => $passType[$sequence->index]
        )->create();

    }
}
