<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardEventsController;
use App\Http\Controllers\DashboardTicketController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;
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
Route::get('/ticket/{ticket:id}', [TicketController::class, 'index'])->name('ticket');
Route::get('/events/{event:slug}',[EventController::class,'show'])->name('event')->middleware('auth');
Route::post('/events/{event:slug}',[EventController::class,'buyTicket']);
Route::get('/calendar', [CalendarController::class, 'show']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'register']);
Route::get('/dashboard/events/checkSlug',[DashboardEventsController::class,'checkSlug'])
->middleware('auth');
Route::get('/dashboard/tickets',[DashboardTicketController::class,'show'])
->middleware('auth');
Route::get('/dashboard',function(){
    return view('dashboard.index',['title'=>'Dashboard', 'greet'=>'Hello '. auth()->user()->name]);
})->middleware('auth');
Route::resource('/dashboard/events',DashboardEventsController::class)->middleware('auth');

