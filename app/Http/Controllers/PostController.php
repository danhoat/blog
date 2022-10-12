<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
//use Response;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    public function index(){
            //$posts = Post::all();
            //$posts = Post::latest()->with(['category','author'])->get();

            $posts = Post::latest()->filter( request(['search','category','author']) )
                ->paginate(10)->withQueryString();
          //  $posts->appends(Request::all())->links();

            DB::listen(function ($query){
                logger($query->sql, $query->bindings);
            });
            return view('posts.index',[
                'posts' => $posts,
                'categories' => Category::all()
            ]);

    }
    public function show(Post $post){
            return view('posts.detail',[
                'post' => $post,
            ]);

    }
    public function create(){

        return view('posts.create');

    }
    public function save(Request $request){

        $attributes = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'required|image',
            'excerpt'      => 'required',
            'category_id'   => ['required',Rule::exists('categories','id')],
            'content'      => 'required',
        ]);

        $attributes['author_id']    = auth()->user()->id;
        $attributes['slug']         = str_slug($request->title);
        $path = request()->file('thumbnail')->store('thumbnails');
        $attributes['thumbnail']    = $path;
        $post = POST::create($attributes);

        return view('posts.create');

    }
    protected  function getPosts(){
        return Post::latest()->filter()->get();
    }
}
