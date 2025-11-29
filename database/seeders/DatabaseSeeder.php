<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\Admin::create([
            'name' => 'Admin',
            'Email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::create([
            'name' => 'User',
            'Email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\Plans::create([
            'title' => 'Standard',
            'description' => '1 month free',
            'price' => 10,
            'instructions' => 'qwerty qwerty qwerty qwerty',
        ]);
        \App\Models\Plans::create([
            'title' => 'Pro',
            'description' => '2 month free',
            'price' => 20,
            'instructions' => 'qwerty qwerty qwerty qwerty',
        ]);

        \App\Models\Workspace::create([
            'name' => 'TechSolutions',
            'icon' => 'fa-solid fa-location-dot',
            'user_id' => 1,
            'address' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the.',
            'style' => [
                'color' => '#a200ffff',
                'backgroundColor' => '#130066ff'
            ],
        ]);


    }
}
