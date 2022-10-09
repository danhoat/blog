<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });
    $posts = Post::all();
    //$posts = Post::latest()->with(['category','author'])->get();

    return view('posts',[   
        'posts' => $posts,
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {

   // $post = DB::table('posts')->where('slug', $slug)->first();

    return view('post',[
        'post' => $post
    ]);
});

Route::get('users', function () {
    $users = User::list();


    return view('users',[
        'users' => $users,
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {


    return view('posts',[
        'posts' => $category->posts,
        'is_cat'=> $category,
    ]);
});
Route::get('author/{author:username}', function (User $author) {

    Illuminate\Support\Facades\DB::listen(function ($query){
        //logger($query->sql, $query->bindings);
    });
    //dd($author);
    return view('posts',[
        'posts' => $author->posts
    ]);
});



Route::get("users",[UserController::class,'list']);
