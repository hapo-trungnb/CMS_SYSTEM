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
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin'),
        // ]);
        factory('App\User', 10)->create()->each(function ($user) {
            $user->posts()->save(factory('App\Post')->make());
        });
    }
}
