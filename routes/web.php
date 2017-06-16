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
Route::get('/tournaments/{tournament}', 'TournamentsController@show');
Route::get('/tournaments/{tournament}/seasons/{season}', 'SeasonsController@show');
Route::get('/tournaments/{tournament}/seasons/{season}/events/{event}', 'EventsController@show');
Route::get('/players/{player}', 'PlayersController@show');
Route::post('/search', 'SearchController@show');

$selectedW = 0;

Route::get('/test', function () {


	$e = new App\Event;

	$event = $e->find(22);

	dd($event,$event->leagueTable());
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
