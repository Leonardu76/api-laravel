<?php

use Illuminate\Support\Facades\Route;


// Route::get('/usuarios', 'App\Http\Controllers\Api\UserApiController@showUsers');

Route::get('/post/{id}/categoria', 'App\Http\Controllers\Api\CategoriaApiController@postByCategoria');
Route::get('/usuario/{id}/postagens', 'App\Http\Controllers\Api\UserApiController@postByIdUser');
Route::apiResource('/usuarios', 'App\Http\Controllers\Api\UserApiController');
Route::apiResource('/posts', 'App\Http\Controllers\Api\PostagemApiController');
Route::apiResource('/categorias', 'App\Http\Controllers\Api\CategoriaApiController');