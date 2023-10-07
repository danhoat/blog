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
use Response;
//use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    public function index(){
            //$posts = Post::all();
            //$posts = Post::latest()->with(['category','author'])->get();

            /*
            $posts = Post::where('status','publish')->latest()->filter( request(['search','category','author']) )
               ->paginate(10)->withQueryString();
              */
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
    public function edit(Post $post){
        return view('posts.edit',[
            'post' => $post,
        ]);


    }
    public function update(Request $request){

        $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

        $attributes = $request->validate([
            'title'         => 'required|max:255',
            'status'        => 'required|max:10',
            'excerpt'       => 'required',
            // 'category_id'   => ['required',Rule::exists('categories','id')],
            'content'       => 'required',
        ]);
        $post = Post::where("id", $post_id);
        $post->update($attributes);
        return redirect("/posts/{$post->first()->slug}");

    }
    /**
     * Save a  post after submit form.
     **/
    public function save(Request $request){

        $attributes = $request->validate([
            'title'         => 'required',
           // 'thumbnail'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status'        => 'required|max:10',
            'excerpt'       => 'required',
            //'category_id'   => ['required',Rule::exists('categories','id')],
            'content'       => 'required',
        ]);
        $slug =  str_slug($request->title);
        $attributes['author_id']    = auth()->user()->id;
        if (Post::where('slug', $slug)->exists()) {
            $slug = $slug.'-'.time();
        }
        $attributes['slug']         = $slug;


        if($request->thumbnail){
            $base_path = 'public/thumbnails';
            $img_path = $request->file('thumbnail')->store($base_path); // $base_path. image(name.mimeextension).
            $img_name_only = str_replace($base_path.'/', "",$img_path);

            $attributes['thumbnail']    =$img_name_only;
        }
        $post = POST::create($attributes);

       // return view('posts.create');
        return redirect('/admin/tasks/');

    }
    protected  function getPosts(){
        return Post::latest()->filter()->get();
    }
    public  function list(){
        $author_id = auth()->user()->id;

        $t = Post::where('author_id',$author_id)->get();
        //$t =  Post::latest()->get();

         $tt = Post::where('author_id',$author_id)->get();
        return view('posts.list',[
           'posts' => $tt,
           'status' => '0'
        ]);
    }

    /**
     * List all task of current user.
     *
     **/
    public  function tasks(Post $post){
        $status = isset($_GET['status']) ? $_GET['status']:'';
        $author_id = auth()->user()->id;

        $args = array(
            'author_id' =>  $author_id
        );
        if($status){
            $args['status'] = $status;
        }
        $posts = Post::where($args);
        $date = isset($_GET['date']) ? $_GET['date'] : '';
        if(!empty($date))
            $posts = $post->whereDate('created_at', '=', $date);

        $posts = $posts->latest()->paginate(6)->withQueryString();;


        return view('posts.list',[
           'posts'  => $posts,
           'status' => $status,
           'date' => $date
        ]);
    }

    public function delete(){

        $post_id = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
        $post       = Post::where('id', $post_id)->first();

        if( ! auth()->user()  || auth()->user()->id !== $post->author_id ){

            $res = array('success' => false,'msg' => "Denied.You can not delete this post.");
            return Response::json($res);
        }

        $post->delete();
        $response = array('success' => true,'msg' => 'Post has been deleted.');
        return Response::json($response);

    }
}
