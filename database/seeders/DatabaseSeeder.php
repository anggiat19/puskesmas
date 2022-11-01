<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        Role::create([
            'id' => 1,
            'name' => 'admin',


        ]

        );
        Role::create([

            'id' => 2,
            'name' => 'client',

        ]

        );

        User::create([
            'id' => 1,
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'anggiat167@gmail.com',
            'phone' => '085364638752',
            'image'=>'aku.png',
            'role_id'=>'1',


        ]);

    }
}