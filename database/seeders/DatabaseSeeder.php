<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create(['role' => 'author']);
        \App\Models\User::factory(5)->create(['role' => 'editor']);
        \App\Models\User::factory(25)->create(['role' => 'visitor']);

        \App\Models\Category::factory(10)->create();

        \App\Models\Post::factory(30)->create();

        \App\Models\User::factory(2)->create(['role' => 'admin']);
    }
}
