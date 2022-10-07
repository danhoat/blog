<?php

namespace App\Models;

class Post
{
    static function find($slug){
        $path = resource_path("posts/{$slug}.html");
        if( !file_exists($path) ){
            // ddd(' file do not found.');
            // abort(404);
            return redirect('/');
        }
        return cache()->remember("posts.{$slug}",1200, fn()=> file_get_contents($path) );

    }
}
