<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/poster-annonce', 'AnnoncesController@create')->name('createAnnonce');
Route::post('/type-annonce', 'AnnoncesController@typeAnnonce')->name('typeAnnonce');
Route::get('/type-annonce/{type}', 'AnnoncesController@vueTypeAnnonce')->name('vueTypeAnnonce');
Route::post('/categorie-annonce', 'AnnoncesController@categoryAnnonce')->name('categoryAnnonce');


Route::get('/search-annonce', 'AnnoncesController@search')->name('searchAnnonce');


Route::prefix('coli')->namespace('Coli')->name('coli.')->group(function(){

    Route::post('/creationAnnonceLibre','coliController@creationAnnonceColi')->name('createAnnonceValidated');
    Route::get('getInfoAnnonce','coliController@getInfoAnnonce');
    Route::get('/create/{type}/{category}', 'coliController@create')->name('createAnnonceColi');
    //Route::get('/poster-annonce-certifiee', 'coliController@createAnnonceCertifiee')->name('createAnnonceCertifiee');

    Route::post('creationAnnonce','coliController@creationAnnonceColi');
    Route::post('getInfoAnnonce','coliController@getInfoAnnonce');

    Route::get('testGet','coliController@infoTest');
});
Route::prefix('users')->namespace('Users')->name('users.')->group(function(){

    Route::get('mon-espace','ComptesController@index')->name('monEspace');

});
