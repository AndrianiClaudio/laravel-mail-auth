<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::namespace ('Api')
    ->group(function () {
        Route::post('/contacts', 'ContactController@store');
        Route::get('/projects', 'ProjectController@all');
        Route::get('/technologies', 'TechnologyController@all');
        Route::post('/projects/technologies', 'ProjectController@filterByTechnologies');
    });