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
        // $this->call(usersSeeder::class);
        // $this->call(categorySeeder::class);
        $this->call(postSeeder::class);
    }
}
