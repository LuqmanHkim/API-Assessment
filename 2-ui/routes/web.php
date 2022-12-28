<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Mail\CreatingEventMail;
use App\Events\CreatingEvent;
use Illuminate\Support\Facades\Mail;

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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('events', EventController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/funny', function() {
    Mail::to('yeyoohjer99@gmail.com')->send(new CreatingEventMail());
    return '<h1>Email Sent Succesfully!!!</h1>';
});
