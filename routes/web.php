<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register.blade.php web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function (Post $post){


//     return view('posts.posts', [
//         'posts'         => Post::latest()->get(),
//         'categories'    => Category::all()
//     ]);
// });

//Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/', function(){
    if (Auth::check()) {
        return redirect('admin/tasks');
   }
   return view('sessions.login_form');

});

Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts.index', [
        'posts'         => $category->posts()->paginate(3),
        'currentCat'    => $category,
        'categories'    => Category::all(),
    ]);
})->name('category');

Route::get('author/{author:username}', function (User $author) {

    return view('posts.index', [
        'posts'         => $author->posts()->paginate(5),
        'categories'    => Category::all(),

    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'loginForm'])->middleware('guest');

Route::post('login', [SessionController::class, 'create'])->middleware('guest');
Route::get('logout', [SessionController::class, 'logout'])->middleware('auth');

Route::post('savecomment', [CommentController::class, 'store']);


// Admin
Route::get('admin/posts/create', [PostController::class,'create'])->middleware('admin');
Route::post('admin/posts/create', [PostController::class,'save'])->middleware('admin');
Route::get('admin/posts/{post:id}/edit/', [PostController::class,'edit'])->middleware('admin');
Route::post('admin/posts/{post:id}/update', [PostController::class,'update'])->middleware('admin');


//Route::get('admin/posts/list', [PostController::class,'list'])->middleware('admin');
Route::get('admin/tasks/', [PostController::class,'tasks'])->middleware('admin');
Route::post('delete_post', [PostController::class, 'delete']);
// End Admin
Route::get("users",[UserController::class,'list']);


//Illuminate\Support\Facades\DB::listen(function ($query){
//    //logger($query->sql, $query->bindings);
//});
//dd($author);

