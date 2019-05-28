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
Route::get('/nometnes', function () {
    return view('nometnes');
});
Route::get('/atbalstitaji', function () {
    return view('atbalstitaji');
});
Route::get('/kontakti', function () {
    return view('kontakti');
});
// Route::get('/nometne/{$id}', function () {
//     return view('nometnes.show');
// });


// Route::get('/{vue_capture?}', function () {
//     return view('layouts.app');
// })->where('vue_capture', '[\/\w\.-]*');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('atbalstitaji', 'AtbalstitajController');
Route::get('atbalstitaji/{id}', 'AtbalstitajController@show');
// Route::resources('dokumenti', 'DokumentController');
// Route::resources('galerijas', 'GalerijaController');
// Route::resources('komentars', 'KomentarController');
// Route::resources('nometnes', 'NometneController');
// Route::resources('users', 'UserController');
