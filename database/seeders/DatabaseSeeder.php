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
use App\Models\Transactions;
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
            'Grand-Bassam',
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
          $comm_bassam = [
              'Mossou',
              'Mockeyville',
            ];
            $comm_ouaga = [
                'Ouaga 200',
                'Pissy',
                'Dassasgo',
                'Somgandé',
                'Saaba',
                'Zone du bois',
              ];
              $comm_bobo = [
                  'Bolmakote',
                  'Belle-ville',
                ];

        
        $abbType = [
            [
                'title' => 'Gratuit',
                'pourcentage_demarcheur' => 0,
                'max_place' => 3,
                'max_image' => 5,
                'max_video' => 0,
                'max_video_second' => 0,
                'max_user' => 1,
                'freeviews' => 0,
                'type' => 'personal',
                'price' => 0,
                'user_price' => 0,
                'has_freeview' => false,
            ],
            [
                'title' => 'Démarcheur',
                'pourcentage_demarcheur' => 18,
                'max_place' => 5,
                'max_image' => 5,
                'max_video' => 0,
                'max_video_second' => 0,
                'max_user' => 1,
                'freeviews' => 0,
                'type' => 'personal',
                'price' => 10000,
                'user_price' => 0,
                'has_freeview' => true,
            ],
            [
                'title' => 'Agent Immobilier',
                'max_place' => 10,
                'max_image' => 5,
                'max_video' => 1,
                'max_video_second' => 30,
                'max_user' => 1,
                'freeviews' => 1,
                'pourcentage_demarcheur' => 25,
                'type' => 'personal',
                'price' => 25000,
                'user_price' => 0,
                'has_freeview' => true,
            ],
            [
                'title' => 'silver',
                'pourcentage_demarcheur' => 25,
                'max_place' => 25,
                'max_image' => 10,
                'max_video' => 1,
                'max_video_second' => 30,
                'max_user' => 3,
                'freeviews' => 5,
                'type' => 'company',
                'price' => 30000,
                'user_price' => 5000,
                'has_freeview' => true,
            ],
            [
                'title' => 'gold',
                'pourcentage_demarcheur' => 25,
                'max_place' => 30,
                'max_image' => 10,
                'max_video' => 2,
                'max_video_second' => 30,
                'max_user' => 10,
                'freeviews' => 10,
                'type' => 'company',
                'price' => 50000,
                'user_price' => 5000,
                'has_freeview' => true,
            ],
            [
                'title' => 'Black',
                'pourcentage_demarcheur' => 25,
                'max_place' => 100,
                'max_image' => 10,
                'max_video' => 2,
                'max_video_second' => 120,
                'max_user' => 10000,
                'freeviews' => 30,
                'type' => 'company',
                'price' => 100000,
                'user_price' => 5000,
                'has_freeview' => true,
            ],

          ];

        $passType = [
            [
                'name' => 'Bronze',
                'nb_visite' => 5,
                'price' => '2000',
            ],
            [
                'name' => 'Argent',
                'nb_visite' => 10,
                'price' => '3000',
            ],
            [
                'name' => 'OR',
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
            'country_code' => 'ci',
            'lang' => 'français',
            'lang_code' => 'fr',
            'currency' => 'Francs CFA',
            'currency_code' => 'F CFA',
            'phone_index' => 225,
            'phone_digit_number' => 10,
        ])->create();

        
        City::factory()->count(2)->sequence(
            fn (Sequence $sequence) => ['name' => $citbf[$sequence->index]]
        )->forCountry([
            'name' => 'Burkina Faso',
            'country_code' => 'bf',
            'lang' => 'français',
            'lang_code' => 'fr',
            'currency' => 'Francs CFA',
            'currency_code' => 'F CFA',
            'phone_index' => 226,
            'phone_digit_number' => 8,
        ])->create();

        Communes::factory()->count(sizeof($comm_abj))->sequence(
            fn (Sequence $sequence) => ['name' => $comm_abj[$sequence->index], 'city_id' => 1]
        )->create();
        
        Communes::factory()->count(sizeof($comm_bassam))->sequence(
            fn (Sequence $sequence) => ['name' => $comm_bassam[$sequence->index], 'city_id' => 2]
        )->create();
        
        Communes::factory()->count(sizeof($comm_ouaga))->sequence(
            fn (Sequence $sequence) => ['name' => $comm_ouaga[$sequence->index], 'city_id' => 3]
        )->create();
        
        Communes::factory()->count(sizeof($comm_bobo))->sequence(
            fn (Sequence $sequence) => ['name' => $comm_bobo[$sequence->index], 'city_id' => 4]
        )->create();

        AbonnementType::factory()->count(6)->sequence(
            fn (Sequence $sequence) => $abbType[$sequence->index]
        )->create();

        PassType::factory()->count(3)->sequence(
            fn (Sequence $sequence) => $passType[$sequence->index]
        )->create();

        Transactions::factory()->create(
            [
                'transaction_number' => '000BasePyraImmo',
                'operation_id' => '000BasePyraImmo',
                'date_transaction' => today(),
                'amount' => '0',
                'transaction_way' => 'PyraImmo',
                'transaction_type' => 'free_from_Pyra_Immo',
                'is_validated' => 1,
                
            ]
        );

    }
}
