<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inbox', [App\Http\Controllers\PageController::class, 'inbox'])->name('inbox');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/compaign', [App\Http\Controllers\PageController::class, 'compaign'])->name('compaign');


/**
 * 
 * 
 * Auth logout
 */
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/login');
});
