<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardEventsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('index', ['title' => 'home']);
});
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{event:slug}',[EventController::class,'show']);
Route::get('/calendar', [CalendarController::class, 'show']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'register']);
Route::get('/dashboard',function(){
    return view('dashboard.index',['title'=>'Hello '. auth()->user()->name]);
})->middleware('auth');
Route::resource('/dashboard/events',DashboardEventsController::class);

