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


    //$posts = Post::all();
    //$posts = Post::latest()->with(['category','author'])->get();

    $posts = Post::latest();

    if(request('search')){
        logger('is search');
        $posts->where('title','like','%'.request('search').'%' );
    }

    Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });
    return view('posts',[
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {

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
        'currentCat' => $category,
        'categories'=> Category::all(),
    ]);
})->name('category');
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
