<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    static function all(){
        $files = File::files(resource_path("posts/"));
        return array_map( function ($file){
            return $file->getContents();
        }, $files);


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
