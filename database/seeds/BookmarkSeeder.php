<?php

use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            'name' => 'Google',
            'link' => 'https://www.google.com',
            'description' => 'The largest search engine in the world!',
            'public'=> 1,
            'user_id' => 3,
        ]);

        DB::table('bookmarks')->insert([
            'name' => 'Twitter',
            'link' => 'https://twitter.com/',
            'description' => 'Social media',
            'public'=> 0,
            'user_id' => 3,
        ]);

        DB::table('bookmarks')->insert([
            'name' => 'Youtube',
            'link' => 'https://www.youtube.com/',
            'description' => 'Watch Video',
            'public'=> 1,
            'user_id' => 1,
        ]);

        DB::table('bookmarks')->insert([
            'name' => 'My GitHub',
            'link' => 'https://github.com/AllenWorker',
            'description' => 'My personal Github repository',
            'public'=> 0,
            'user_id' => 3,
        ]);
    }
}
