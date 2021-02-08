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


//Route::get('/search-annonce', 'AnnoncesController@search')->name('searchAnnonce'); // recherche utilise la vue de se controller


Route::prefix('coli')->namespace('Coli')->name('coli.')->group(function(){

    Route::post('/creationAnnonceLibre','coliController@creationAnnonceColi')->name('createAnnonceValidated');
    Route::get('getInfoAnnonce','coliController@getInfoAnnonce');
    Route::get('/create/{type}/{category}', 'coliController@create')->name('createAnnonceColi');
    //Route::get('/poster-annonce-certifiee', 'coliController@createAnnonceCertifiee')->name('createAnnonceCertifiee');
    Route::post('/rechercheAnnonce','coliRechercheController@rechercheColi')->name('rechercheAnnonceColi');
    Route::get('reserver/{id}','coliController@reservationColi')->name('reservationColi');
    Route::post('reservation-post','coliController@reservationColiPost')->name('reservationColiPost');
    Route::post('creationAnnonce','coliController@creationAnnonceColi');
    Route::post('getInfoAnnonce','coliController@getInfoAnnonce');

    Route::get('testGet','coliController@infoTest');
});
Route::prefix('users')->namespace('Users')->name('users.')->group(function(){

    Route::get('mon-espace','ComptesController@index')->name('monEspace');
    Route::get('consulter-annonce','ComptesController@consulterAnnonce')->name('consulterAnnonce');
    Route::get('consulter-reservation/{id}','ComptesController@consulterReservations')->name('consulterReservations');
    Route::get('accepter-reservation/{id}','ComptesController@accepterReservation')->name('accepteReservation');
    Route::get('refuser-reservation/{id}','ComptesController@refuserReservation')->name('refuserReservation');
    Route::get('mon-profile','ComptesController@monProfile')->name('monProfile');
    Route::get('type-colis','ComptesController@coliTransportes')->name('coliTransportes');
    Route::get('verification-compte','ComptesController@verificationCompte')->name('verificationCompte');
    Route::get('avis-utilisateurs','ComptesController@avisUtilisateurs')->name('avisUtilisateurs');
    Route::get('notifications','ComptesController@notifications')->name('notifications');
    Route::get('change-password','ComptesController@changePassword')->name('changePassword');
    Route::get('fermeture-compte','ComptesController@fermetureCompte')->name('fermetureCompte');


});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){

    Route::get('index','AdminController@index')->name('index');
    Route::get('list-users','AdminController@listUsers')->name('listUsers');
    Route::get('list-annonce','AdminController@listAnnonce')->name('listAnnonce');



});
