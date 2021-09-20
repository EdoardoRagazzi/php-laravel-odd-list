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
        // $this->call(UsersTableSeeder::class);

        // when  you wanna call all the seedeer together  -->writing only php artisan db:seed (general seeder)
        // $this->call([
        //     PostsTableSeeder::class,
        //     CategoriesTableSeeder::class
        // ]);
    }
}
