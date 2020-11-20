<?php

use App\Http\Controllers\TodoController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('todos', TodoController::class);

Route::prefix('todos')->group(function() {
    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::get('/create', 'TodoController@create')->name('todo.create');
    Route::post('/', 'TodoController@store')->name('todo.store');
});