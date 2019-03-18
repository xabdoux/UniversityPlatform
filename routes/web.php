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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','can:enseignant']], function () {

		    Route::get('test', function () {
		    return view('welcome');
		});


});

Route::group(['middleware' => ['auth','can:etudiant']], function () {

});
Route::group(['middleware' => ['auth','can:coordinateur']], function () {

});
Route::group(['middleware' => ['auth','can:administration']], function () {

});
Route::group(['middleware' => ['auth','can:superadmin']], function () {

});