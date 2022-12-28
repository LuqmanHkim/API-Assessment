<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Mail\CreatedEventEmail;
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

Route::get('/funny', function() {
    Mail::to('papejer858@gmail.com')->send(new CreatedEventEmail());

    return '<h1>Email Sent</h1>';
});
