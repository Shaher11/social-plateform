<?php

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
        $this->call(RoleSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusSeeder::class);
    
        //        factory('App\Role',2)->create(['name'=>['Admin','Client'] ]);
    }
}