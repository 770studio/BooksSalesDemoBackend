<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


JsonApi::register('default')->routes(function ($api) {
    $api->resource('users')->relationships(function ($relations) {
        $relations->hasMany('rents');
    });
    $api->resource('books')->relationships(function ($relations) {
        $relations->hasMany('rents');
    });

    $api->resource('rents')->relationships(function ($relations) {
        $relations->hasOne('users');
        $relations->hasOne('books');
    })->async();
});
