<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;

Route::get('facebook/login', function() {
    try {
        SocialAuth::login('facebook');
    } catch (ApplicationRejectedException $e) {
        // User rejected application
    } catch (InvalidAuthorizationCodeException $e) {
        // Authorization was attempted with invalid
        // code,likely forgery attempt
    }

    // Current user is now available via Auth facade
    $user = Auth::user();
	//dd($user);
    return Redirect::intended();
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shows', function () {
    return view('shows-search');
});

Route::get('facebook/authorize', function() {
    return SocialAuth::authorize('facebook');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/search', 'MoviesSearchController@search');
Route::post('/shows/search', 'ShowsSearchController@search');
Route::get('/movie/{id}', 'MoviesSearchController@show');
