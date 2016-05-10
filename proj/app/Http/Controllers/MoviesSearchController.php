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
    	$search = new Movies;
    	$movies = $search->searchByTitle(urlencode($request->search));
        return view('search-results')->with(["movies" => $movies]);
    }
}
