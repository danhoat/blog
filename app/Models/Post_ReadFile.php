<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    function __construct($title, $excerpt, $date, $slug, $author , $content){
        $this->title    = $title;
        $this->excerpt  = $excerpt;
        $this->date     = $date;
        $this->slug     = $slug;
        $this->author   = $author;
        $this->content  = $content;
    }
    static  function list(){
        $posts = Post::all();
        return $posts;
    }
    static function all11(){

        return cache()->remember('posts.all_',0, function(){
            $files = File::files(resource_path("posts/"));
            return collect($files)->map(
                function($file) {
                    $document = YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->slug,
                        $document->author,
                        $document->body(),
                    );
                })->sortByDesc('date' );
        });

    }
    static function find($slug){
//        $path = resource_path("posts/{$slug}.html");
//        if( !file_exists($path) ){
//            // ddd(' file do not found.');
//            // abort(404);
//            throw new ModelNotFoundException();
//            return redirect('/');
//        }
//        $document = $document = YamlFrontMatter::parseFile($path);
//
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->slug,
//            $document->author,
//            $document->body(),
//        );
//
//        return cache()->remember("posts.{$slug}",0, fn()=> file_get_contents($path) );
            $post = static::all()->firstWhere('slug',$slug);
            if( !$post )
                throw new ModelNotFoundException();
            return $post;
    }
}
