<?php

use Illuminate\Http\Request;

$http = new GuzzleHttp\Client;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    
Route::post('login/clientes', 'UsuarioClientesController@login');


Route::post('login', 'UsersController@login');
//Route::post('register', 'UsersController@register');

Route::post('user/createClient', 'ClientesController@store');

Route::get('user/getClientes','ClientesController@index'); 

Route::delete('user/deleteCliente/{id}','ClientesController@destroy'); 

Route::get('user/searchCliente/{id}','ClientesController@show'); 

Route::put('user/editCliente/{id}','ClientesController@update');



Route::post('user/createPublicidad','PublicidadsController@store');

Route::get('user/getPublicidads', 'PublicidadsController@index');

Route::get('user/searchPublicidad/{id}', 'PublicidadsController@show');

Route::put('/user/editPublicidad/{id}', 'PublicidadsController@update');

Route::delete('user/deletePublicidad/{id}', 'PublicidadsController@destroy');





Route::post('user/createCategoria', 'CategoriasController@store');

Route::get('user/getCategorias', 'CategoriasController@index');

Route::delete('user/deleteCategoria/{id}', 'CategoriasController@destroy');