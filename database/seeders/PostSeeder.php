<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'         => 'My First Post',
            'slug'          => 'my-first-post',
            'author_id'       => 1,
            'category_id'   => 1,
            'excerpt'       => 'Excerpt of my first post',
            'content'       => ' Full content  of my first post'
        ]);

        DB::table('posts')->insert([
            'title'      => 'My Second Post',
            'slug'     => 'my-second-post',
            'author_id' => 2,
            'category_id' => 2,
            'excerpt'  => 'Excerpt of my second post',
            'content' => ' Full content  of my first post'
        ]);
        DB::table('posts')->insert([
            'title'      => 'Laravel Tutorial Post',
            'slug'     => 'laravel-tutorial-post',
            'author_id' => 3,
            'category_id' => 2,
            'excerpt'  => 'Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.',
            'content' => 'Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order. Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.'
        ]);
    }
}
