<?php

use Illuminate\Support\Facades\Route;


// Route::get('/usuarios', 'App\Http\Controllers\Api\UserApiController@showUsers');

Route::get('/post/{id}/categoria', 'App\Http\Controllers\Api\CategoriaApiController@postByCategoria');
Route::get('/usuario/{id}/postagens', 'App\Http\Controllers\Api\UserApiController@postById');
Route::apiResource('/usuarios', 'App\Http\Controllers\Api\UserApiController');
Route::get('/post/{id}/usuario', 'App\Http\Controllers\Api\PostagemApiController@autorById');
Route::apiResource('/post', 'App\Http\Controllers\Api\PostagemApiController');