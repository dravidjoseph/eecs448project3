<?php

namespace App\Http\Controllers;

use App\Guidebox\Shows;
use App\Http\Requests;
use Illuminate\Http\Request;

class ShowsSearchController extends Controller
{
    /**
     * Show a list of shows from the API.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    	$this->validate($request, [
	        'search' => 'required|max:255',
	    ]);
    	$search = new Shows;
    	$shows = $search->searchByTitle(urlencode($request->search));
        return view('shows-results')->with(["shows" => $shows]);
    }

    /**
     * Show a specific show.
     *
     * @param  int 	$id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$search = new Shows;
    	$show = $search->getById($id);
    	$seasons = $search->getSeasonEpisodes($id);
        return view('show')->with(["show" => $show, "seasons" => $seasons]);
    }



    /**
     * Show details of a specific episode.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEpisode($id)
    {
        $search = new Shows;
        $episode = $search->getEpisode($id);
        return view('episode')->with(["episode" => $episode]);
    }
}
