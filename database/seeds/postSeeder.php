<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 5)->create();
    }
}
