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
        \App\Models\User::factory(1)->state(["email" => "user@mail.com"])->create();
        \App\Models\User::factory(1)->state(["email" => "admin@mail.com", "is_admin" => true])->create();
        \App\Models\User::factory(10)->create();
    }
}
