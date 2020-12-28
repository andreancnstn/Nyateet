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
    return view('home');
});

Route::get('/home', function () {
    return redirect()->route('todo.todayIndex');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('todos')->group(function() {
        Route::get('/today', 'TodoController@todayIndex')->name('todo.todayIndex');
        Route::get('/active', 'TodoController@activeIndex')->name('todo.activeIndex');
        Route::get('/history', 'TodoController@historyIndex')->name('todo.historyIndex');
        Route::get('/create', 'TodoController@create')->name('todo.create');
        Route::post('/', 'TodoController@store')->name('todo.store');
        Route::get('/{id}', 'TodoController@show')->name('todo.show');
        Route::get('/edit/{id}', 'TodoController@edit')->name('todo.edit');
        Route::post('/update/{id}', 'TodoController@update')->name('todo.update');
        Route::get('/start/{id}', 'TodoController@start')->name('todo.start');
        Route::get('/delete/{id}', 'TodoController@destroy')->name('todo.delete');
    });
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/profile', function() {
        return view('profile');
    })->name('profile');
    Route::post('/profile/{id}', 'UserController@update')->name('user.update');

    // PART OF AJAX DOCUM DO NOT DELETE
    // Route::get('ajax', 'TodoController@ajaxReq');
    // Route::get('getCatName', 'TodoController@getCatName');
});

