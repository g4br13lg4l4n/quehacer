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
$http = new GuzzleHttp\Client;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'UsersController@login');
//Route::post('register', 'UsersController@register');

Route::post('user/createClient', 'ClientesController@store');

Route::get('user/getClientes','ClientesController@index'); 

Route::delete('user/deleteCliente/{id}','ClientesController@destroy'); 

Route::get('user/searchCliente/{id}','ClientesController@show'); 

Route::put('user/editCliente/{id}','ClientesController@update');

Route::post('user/createPublicidad','PublicidadsController@store');

Route::get('user/getPublicidad', 'PublicidadsController@index');