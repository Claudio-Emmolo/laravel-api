<?php

namespace Database\Seeders;

use App\Models\Tecnology;
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
        $this->call([
            UserTableSeeder::class,
            TypesTableSeeder::class,
            ProjectsTableSeeder::class,
            TechnologyTableSeeder::class,
            ProjectTechnologyTableSeeder::class,
        ]);
    }
}
