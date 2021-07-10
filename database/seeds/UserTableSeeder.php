<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\User::class,20)->create()->each(function($user){

        //     $user->posts()->save(factory('App\Post')->make());
        // });

        User::create([
            'full_name' => 'Mohamed Ramadan',
            'user_name' => 'ramadan',
            'status' => 1,
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->each(function($user){
            $user->posts()->save(factory('App\Post')->make());
        });
        
        
        User::create([
            'full_name' => 'Guest 1',
            'user_name' => 'guest_1',
            'status' => 1,
            'role_id' => 2,
            'email' => 'guest1@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        User::create([
            'full_name' => 'Guest 2',
            'user_name' => 'guest_2',
            'status' => 1,
            'role_id' => 2,
            'email' => 'guest2@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}