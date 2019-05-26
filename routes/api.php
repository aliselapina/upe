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

    Route::get('nometne/{id}', 'NometneController@show');
    Route::get('user/{id}', 'UserController@show');
    Route::get('atbalstitaj/{id}', 'AtbalstitajController@show');
    
    
    


//paradit sarakstu

//Route::get('users', 'UserController@index');

Route::get('users', 'UserController@index');
Route::get('atbalstitaji', 'AtbalstitajController@index');
//Route::get('dokuments', 'DokumentController@index');
// Route::get('galerijas', 'GalerijController@index');
// Route::get('komentars', 'KomentarController@index');
//Route::get('lomas', 'LomaController@index');
Route::get('nometnes', 'NometneController@index');
Route::get('kontakti', 'KontaktController@index');

//paradit konkretu lietu no sarakstiem 

//Route::get('dokument/{id}', 'DokumentController@show');
// Route::get('galerija/{id}', 'GalerijaController@show');
// Route::get('komentar/{id}', 'KomentarController@show');
// Route::get('loma/{id}', 'LomaController@show');
//izveidot jaunu lietu sarakstaa

Route::post('atbalstitaj', 'AtbalstitajController@store');
// Route::post('dokument', 'DokumentController@store');
// Route::post('galerija', 'GalerijaController@store');
// Route::post('komentar', 'KomentarController@store');
Route::post('nometne', 'NometneController@store');
Route::post('user', 'UserController@store');
//atjaunot kadu no lietam 

Route::put('atbalstitaj', 'AtbalstitajController@store');
// Route::put('dokument', 'DokumentController@store');
// Route::put('galerija', 'GalerijaController@store');
// Route::put('komentar', 'KomentarController@store');
Route::put('nometne', 'NometneController@store');
Route::put('user', 'UserController@store');
//izdzest lietu no saraksta

Route::delete('atbalstitaj/{id}', 'AtbalstitajController@destroy');
// Route::delete('dokument/{id}', 'DokumentController@destroy');
// Route::delete('galerija/{id}', 'GalerijaController@destroy');
// Route::delete('komentar/{id}', 'KomentarController@destroy');
Route::delete('nometne/{id}', 'NometneController@destroy');
Route::delete('user/{id}', 'UserController@destroy');

