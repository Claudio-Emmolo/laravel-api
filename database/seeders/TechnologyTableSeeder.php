<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologyList = ['HTML', 'CSS', 'JS', 'Vue 3', 'Bootstrap', 'NodeJS', 'PHP', 'Composer', 'Laravel'];

        foreach ($technologyList as $technologyName) {
            $newTecnology = new Technology();
            $newTecnology->name = $technologyName;
            $newTecnology->color_tag = $faker->unique()->hexColor();
            $newTecnology->save();
        }
    }
}
