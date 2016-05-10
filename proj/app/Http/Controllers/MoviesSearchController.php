<?php

namespace App\Http\Controllers;

use App\Guidebox\Movies;
use App\Http\Requests;
use Illuminate\Http\Request;

class MoviesSearchController extends Controller
{
    /**
     * Show a list of movies from the API.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    	$this->validate($request, [
	        'search' => 'required|max:255',
	    ]);
    	$search = new Movies;
    	$movies = $search->searchByTitle(urlencode($request->search));
        return view('search-results')->with(["movies" => $movies]);
    }

    /**
     * Show a specific movie.
     *
     * @param  int 	$id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$search = new Movies;
    	$movie = $search->getById($id);
        return view('movie')->with(["movie" => $movie]);
    }
}
