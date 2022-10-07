<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    function __construct($title, $excerpt,  $date, $content){
        $this->title   = $title;
        $this->excerpt = $excerpt;
        $this->date    = $date;
        $this->content = $content;
    }
    static function all(){
        $files = File::files(resource_path("posts/"));
        $post = [];
        foreach ($files as $file) {
            $document = YamlFrontMatter::parseFile($file);

            $posts[] = new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
            );
        }
        //}, $files);

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
        return cache()->remember("posts.{$slug}",0, fn()=> file_get_contents($path) );

    }
}
