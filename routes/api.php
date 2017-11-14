<?php

use Illuminate\Http\Request;

$http = new GuzzleHttp\Client;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['web']], function () {
    Route::get('login/facebook', 'SocialProfilesController@facebook');
    Route::get('login/facebook/callback', 'SocialProfilesController@callback');
});



Route::post('login', 'UsersController@login');
//Route::post('register', 'UsersController@register');

Route::post('user/createClient', 'ClientesController@store');

Route::get('user/getClientes','ClientesController@index'); 

Route::delete('user/deleteCliente/{id}','ClientesController@destroy'); 

Route::get('user/searchCliente/{id}','ClientesController@show'); 

Route::put('user/editCliente/{id}','ClientesController@update');



Route::post('user/createPublicidad','PublicidadsController@store');

Route::get('user/getPublicidads', 'PublicidadsController@index');

Route::get('user/getPublicidadChart/{id}', 'PublicidadsController@getPublicidadChart');

Route::get('user/searchPublicidad/{id}', 'PublicidadsController@show');

Route::put('/user/editPublicidad/{id}', 'PublicidadsController@update');

Route::delete('user/deletePublicidad/{id}', 'PublicidadsController@destroy');

Route::get('user/getPublicidadForCategory/{id}', 'PublicidadsController@getPublicidadForCategory');


Route::post('user/createCategoria', 'CategoriasController@store');

Route::get('user/getCategorias', 'CategoriasController@index');

Route::get('user/searchCategoria/{id}', 'CategoriasController@show');

Route::put('user/editCategoria/{id}', 'CategoriasController@update');

Route::delete('user/deleteCategoria/{id}', 'CategoriasController@destroy');



Route::get('user/getUserApps', 'UserAplicationsController@index');
Route::get('user/searchUserApps/{id}', 'UserAplicationsController@show');
Route::post('user/createUserApp', 'UserAplicationsController@store');
Route::get('user/searchUserAppsForFacebook/{id}','UserAplicationsController@searchFacebook');


Route::post('user/createPublicidadInterest', 'PublicidadInterestsController@store');


Route::post('user/createSugerencia','SugerenciasController@store');
Route::get('user/getSugerencias', 'SugerenciasController@index');
Route::delete('user/deleteSugerencia/{id}', 'SugerenciasController@destroy');
