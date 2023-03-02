<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // $my_project = [ //Todo - add my project
        //     [
        //         "title" => '',
        //         "url" => '',
        //         "date" => '20/10/2020',
        //         "preview_img" => null,
        //         "difficulty" => '',
        //         "tecnologies" => ''
        //     ],

        // ];

        for ($i = 0; $i < 50; $i++) {
            $newProject = new Project();
            $newProject->type_id = Type::inRandomOrder()->first()->id;
            $newProject->title = $faker->unique()->sentence(4);
            $newProject->url = $faker->url();
            $newProject->date = $faker->dateTime();
            $newProject->preview_img = $faker->imageUrl(600, 600);
            $newProject->difficulty = $faker->randomDigit();
            // $newProject->tecnologies = $faker->word(5);
            $newProject->save();
        }
    }
}