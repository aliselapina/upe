<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lietotaji', function () {
    return view('lietotaji');
});

Route::get('/kontakti', function () {
    return view('kontakti');
});
Route::get('/good', function () {
    return view('good');
});

Route::post('apply', [
    'uses' => 'ApplyController@store']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('atbalstitaji', 'AtbalstitajController');
Route::get('/atbalstitaji/{id}', 'AtbalstitajController@show');

Route::resource('nometnes', 'NometneController');
Route::get('/nometnes/{id}', 'NometneController@show');

//Route::resource('users', 'UserController');
//Route::get('/users/{id}', 'UserController@show');