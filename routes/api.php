<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->group(function() {
    Route::get('/login', 'Auth\LoginController@login');
    Route::get('/reset_password', 'Auth\ResetPasswordController@resetSenha');
});

Route::middleware('auth:api')->group(function() {
    Route::get('/catadores', 'CatadorController@get');
    Route::get('/catador/post', 'CatadorController@post');
    Route::get('/recipientes', 'RecipienteController@get');
    Route::match(['get', 'post'], '/recipiente/post', 'RecipienteController@post');
});
