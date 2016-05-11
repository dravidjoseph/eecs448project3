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
        SocialAuth::login('facebook',function($user,$details){
		
			$user->name = $details->full_name;
			$user->email = $details->email;
			$user->save();
		});
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


Route::auth();

Route::get('facebook/authorize', function() {
    return SocialAuth::authorize('facebook');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/shows', function () {
        return view('shows-search');
    });
    Route::get('/home', 'HomeController@index');
    Route::post('/search', 'MoviesSearchController@search');
    Route::post('/shows/search', 'ShowsSearchController@search');
    Route::get('/movie/{id}', 'MoviesSearchController@show');
    Route::get('/show/{id}', 'ShowsSearchController@show');
    Route::get('/episode/{id}', 'ShowsSearchController@showEpisode');
});