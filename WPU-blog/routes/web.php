<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;


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
    return view('home', [
        "title" => "home"
    ]);
});
Route::get('/about', function () {
    return view("about", [
        "title" => "about"
    ]);
});

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{post:slug}',[PostController::class,'show'] );
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
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboards', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');
?>