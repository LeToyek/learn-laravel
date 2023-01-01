<?php 

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;


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
    return view('welcome');
});

Route::get('/home', function () {
    return view('login.index', [
        "title" => "home"
    ]);
});
Route::get('/about', function () {
    return view("about", [
        "title" => "about"
    ]);
});

Route::get('/posts', [PostController::class,'index']);
Route::get('/post/{post:slug}',[PostController::class,'getDetail'] );
Route::get('/categories/{category:slug}',function(Category $category){
    return view('posts',[
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts,
        'category' => $category,
    ]);
});
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/author',[UserController::class,'show'] );
Route::get('/author/{author:name}',[UserController::class,'show'] );
Route::get('/login', [LoginController::class,'index']);


?>