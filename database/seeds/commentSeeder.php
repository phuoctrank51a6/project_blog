<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;
class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 20)->create();
    }
}
