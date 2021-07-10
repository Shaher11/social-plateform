<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        factory(\App\Role::class,['Admin','Client'])->create();

        $admin = Role::create([
            'name' => 'Admin'
        ]);

        $client = Role::create([
            'name' => 'Guest'
        ]);

    }
}