<?php
use App\Models\Post;
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
    //$posts = Post::list();
    $posts = Post::all();

    return view('posts',[
        'posts' => $posts,
    ]);
});

Route::get('posts/{post}', function ($slug) {

    $post = DB::table('posts')->where('slug', $slug)->first();


    return view('post',[
        'post' => $post
    ]);
})->where('post','[A-z\-]+');

Route::get('users', function () {
    $users = User::list();


    return view('users',[
        'users' => $users,
    ]);
});

Route::get("users",[UserController::class,'list']);
