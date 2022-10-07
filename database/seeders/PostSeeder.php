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
            'title'      => 'My First Post',
            'slug'     => 'my-first-post',
            'author' =>  'Kent Nguyen',
            'excerpt'  => 'Excerpt of my first post',
            'content' => ' Full content  of my first post'
        ]);

        DB::table('posts')->insert([
            'title'      => 'My Second Post',
            'slug'     => 'my-second-post',
            'author' =>  'Dan Nguyen',
            'excerpt'  => 'Excerpt of my second post',
            'content' => ' Full content  of my first post'
        ]);
    }
}
