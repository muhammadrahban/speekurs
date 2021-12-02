<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Post::class, 50)->create()->each(function($post){
        //     $post->save();
        // });

        factory(App\Like::class, 50)->create()->each(function($like){
            $like->save();
        });
    }
}
