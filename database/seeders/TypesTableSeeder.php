<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeList = ['front-end', 'back-end', 'full-stack'];

        foreach ($typeList as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
