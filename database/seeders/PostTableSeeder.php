<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hard-coded test seed
        // $p1 = new Post;

        // $p1->title = "Hard-coded Test";
        // $p1->caption = "Butterfly picture";
        // $p1->user_id = "4";
        // $p1->save();

        // //Generated test seed via PostFactory.php
        // \App\Models\Post::factory()->count(5)->create();
    }
}
