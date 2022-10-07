<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    function __construct($title, $excerpt, $date, $link, $author , $content){
        $this->title    = $title;
        $this->excerpt  = $excerpt;
        $this->date     = $date;
        $this->link     = $link;
        $this->author     = $author;
        $this->content  = $content;
    }
    static function all(){

        return cache()->rememberForever('posts.all', function(){
            $files = File::files(resource_path("posts/"));
            return collect($files)->map(
                function($file) {
                    $document = YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->link,
                        $document->author,
                        $document->body(),
                    );
                })->sortBy('date');
        });

    }
    static function find($slug){
        $path = resource_path("posts/{$slug}.html");
        if( !file_exists($path) ){
            // ddd(' file do not found.');
            // abort(404);
            throw new ModelNotFoundException();
            return redirect('/');
        }
        $document = $document = YamlFrontMatter::parseFile($path);

        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->link,
            $document->author,
            $document->body(),
        );

        return cache()->remember("posts.{$slug}",0, fn()=> file_get_contents($path) );

    }
}
