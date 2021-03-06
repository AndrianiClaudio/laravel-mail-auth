<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'Guest\HomeController@index')->name('guest.index');

// ADMIN
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/project', 'ProjectController@index')->name('project.index');
        Route::get('/project/create', 'ProjectController@create')->name('project.create');
        Route::post('/project/store', 'ProjectController@store')->name('project.store');
        Route::get('/project/{id}/edit', 'ProjectController@edit')->name('project.edit');
        Route::patch('/project/{id}/update', 'ProjectController@update')->name('project.update');
    });
    
// DEFAULT
Route::get('{any?}', function ($name = null) {
    return redirect()->route('guest.index');
})->where('any', '.*');