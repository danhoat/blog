<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    static function all(){
        $posts = File::files(resource_path("posts/"));

        return $posts;

    }
    static function find($slug){
        $path = resource_path("posts/{$slug}.html");
        if( !file_exists($path) ){
            // ddd(' file do not found.');
            // abort(404);
            throw new ModelNotFoundException();
            return redirect('/');
        }
        return cache()->remember("posts.{$slug}",1200, fn()=> file_get_contents($path) );

    }
}
