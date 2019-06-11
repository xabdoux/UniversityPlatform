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
    return view('auth.login');
})->middleware('guest');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','can:enseignant']], function () {

	Route::get('enseignant', 'enseignantController@dashboard');
	Route::post('rejoindreClasse/{userId}', 'enseignantController@rejoindreClasse');
	Route::post('ajouterPublication/{userId}', 'enseignantController@ajouterPublication');
	Route::post('ajouterCommentaire/{publicationId}', 'enseignantController@ajouterCommentaire');
	Route::post('supprimerPublication/{publicationId}', 'enseignantController@supprimerPublication');
	Route::get('modifierPublication/{publicationId}', 'enseignantController@modifierPublicationView');
	Route::post('modifierPublication/{publicationId}', 'enseignantController@modifierPublication');
	Route::get('afficherPublication/{publicationId}', 'enseignantController@afficherPublication');
	Route::post('loadMore', 'enseignantController@loadMore');
	Route::get('voirToutesPublication', 'enseignantController@voirToutesPublication');
	Route::get('voirProfile', 'enseignantController@voirProfile');
	Route::post('modifierProfile', 'enseignantController@modifierProfile');
	Route::post('changerMdp/{userId}', 'enseignantController@changerMdp');

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