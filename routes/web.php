<?php

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// // Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Guest\HomeController@index')->name('guest.index');
// Route::get('/contact', 'Guest\HomeController@index')->name('guest.contact');
// Route::get('/about', 'Guest\HomeController@index')->name('guest.about');
// Route::get('/contact', 'Guest\HomeController@contact')->name('guest.contact');
// Route::get('/about', 'Guest\HomeController@about')->name('guest.about');


Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/project', 'ProjectController@index')->name('project.index');
        Route::get('/project/create', 'ProjectController@create')->name('project.create');
        Route::post('/project/store', 'ProjectController@store')->name('project.store');
    });
    

Route::get('{any?}', function ($name = null) {
    return view('home');
})->where('any', '.*');