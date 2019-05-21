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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//paradit sarakstu

Route::get('atbalstitajs', 'AtbaltitajController@index');
Route::get('dokuments', 'DokumentController@index');
Route::get('galerijas', 'GalerijController@index');
Route::get('komentars', 'KomentarController@index');
Route::get('lomas', 'LomaController@index');
Route::get('nometnes', 'NometneController@index');
Route::get('nometnes', 'NometneController@index');
Route::get('users', 'UserController@index');

//paradit konkretu lietu no sarakstiem 

Route::get('atbalstitaj/{id}', 'AtbaltitajController@show');
Route::get('dokument/{id}', 'DokumentController@show');
Route::get('galerija/{id}', 'GalerijaController@show');
Route::get('komentar/{id}', 'KomentarController@show');
Route::get('loma/{id}', 'LomaController@show');
Route::get('nometne/{id}', 'NometneController@show');

//izveidot jaunu lietu sarakstaa

Route::post('atbalstitaj', 'AtbaltitajController@store');
Route::post('dokument', 'DokumentController@store');
Route::post('galerija', 'GalerijaController@store');
Route::post('komentar', 'KomentarController@store');
Route::post('nometne', 'NometneController@store');

//atjaunot kadu no lietam 

Route::put('atbalstitaj', 'AtbaltitajController@store');
Route::put('dokument', 'DokumentController@store');
Route::put('galerija', 'GalerijaController@store');
Route::put('komentar', 'KomentarController@store');
Route::put('nometne/{id}', 'NometneController@store');

//izdzest lietu no saraksta

Route::delete('atbalstitaj/{id}', 'AtbaltitajController@destroy');
Route::delete('dokument/{id}', 'DokumentController@destroy');
Route::delete('galerija/{id}', 'GalerijaController@destroy');
Route::delete('komentar/{id}', 'KomentarController@destroy');
Route::delete('nometne/{id}', 'NometneController@destroy');

// Route::get('users', 'UserController@show');


