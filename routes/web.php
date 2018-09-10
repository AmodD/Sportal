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
    return view('home');
})->name('main');

Route::get('/welcome', function() { 
	return view('welcome');
});


Route::get('/teams/{team}', 'TeamsController@show');
Route::get('/clubs/{club}', 'ClubsController@show');


//Route::get('/tournaments/create', function() {
//return ['shrihan', 'soham', 'baby' , 'vivaan'];
//});

Route::get('/tournaments','TournamentsController@index')->name('tournaments');
Route::post('/tournaments','TournamentsController@store')->name('tournaments');
Route::get('/tournaments/create','TournamentsController@create')->name('tournament-create');
Route::get('/tournaments/{tournament}', 'TournamentsController@show');
Route::get('/tournaments/{tournament}/seasons/{season}', 'SeasonsController@show');
Route::get('/tournaments/{tournament}/seasons/{season}/events/{event}', 'EventsController@show');

Route::get('/events','EventsController@index')->name('events');
Route::get('/events/{event}/edit','EventsController@edit')->name('events');
Route::post('/events','EventsController@store');
	

Route::get('/players/{player}', 'PlayersController@show');
Route::post('/search', 'SearchController@show');

$selectedW = 0;

//Route::get('/players/search', 'PlayersController@search');
Route::get('/search/players', 'SearchController@players');

Route::get('/test', function () {

return ['shrihan', 'soham', 'baby' , 'vivaan'];

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/erd', function() { return view('home'); })->name('erd');
Route::get('/journey', function() { return view('home'); })->name('journey');
Route::get('/terminology', function() { return view('home'); })->name('terminology');
Route::get('/faqs', function() { return view('home'); })->name('faqs');
Route::get('/dashboard', function() { return view('home'); })->name('dashboard');

Route::get('/users', 'UsersController@index')->name('users');
Route::patch('/users/{user}','UsersController@update');
Route::delete('/users/{user}','UsersController@destroy');

Route::get('/clubs', 'ClubsController@index')->name('clubs');
Route::patch('/clubs/{club}','ClubsController@update');

//if(request('page') == 2) dd('in web route');

Route::get('/teams', 'TeamsController@index')->name('teams');
//Route::get('/teams/search/{searchedname?}', 'TeamsController@search')->name('teamsearch');
Route::post('/teams','TeamsController@store')->name('teams');
Route::post('/teams/search/{searchedname?}', 'TeamsController@search')->name('teamsearch');

Route::patch('/teams/{team}','TeamsController@update');

