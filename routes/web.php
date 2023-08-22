<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/inbox', [PageController::class, 'inbox'])->name('inbox');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/compaign', [PageController::class, 'compaign'])->name('compaign');
Route::get('/fetch-emails', [App\Http\Controllers\EmailController::class, 'fetchEmails'])->name('fetchEmails');

// Route::get('/fetch-emails', 'EmailController@fetchEmails');

/**
 * 
 * 
 * Auth logout
 */
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/login');
});
