<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::factory(10)->times(1)->create([
            "name"    => "nombredeprueba",
            "email"   => "andreemath27@gmail.com",
            "password"=> bcrypt("12345678")
        ]);

        Project::factory()->times(40)->create();
    }
}
