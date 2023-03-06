<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "level" => 1,
                "name" => 'Admin'
            ],
            [
                "level" => 2,
                "name" => 'User'
            ],
        ];

        foreach ($roles as $role) {
            $newrole = new Role();
            $newrole->level = $role['level'];
            $newrole->name = $role['name'];
            $newrole->save();
        }
    }
}
