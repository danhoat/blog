<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class,'show'] );



Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts',[
        'posts' => $category->posts,
        'currentCat' => $category,
        'categories'=> Category::all(),
    ]);
})->name('category');
Route::get('author/{author:username}', function (User $author) {
    return view('posts',[
        'posts' => $author->posts
    ]);
});

Route::get('users', function () {
    $users = User::list();
    return view('users',[
        'users' => $users,
    ]);
});

Route::get("users",[UserController::class,'list']);


//Illuminate\Support\Facades\DB::listen(function ($query){
//    //logger($query->sql, $query->bindings);
//});
//dd($author);
