<?php

namespace App\Guidebox;

class Movies
{
    /**
     * The key used in the requests.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The URL of the API.
     *
     * @var string
     */
    protected $apiUrl = "https://api-public.guidebox.com/v1.43/US/";

    public function __construct()
    {
        $this->apiKey = env('GUIDEBOX_KEY');
    }

    /**
     * Search for movies containing the title passed.
     *
     * @param  string   $title
     * @return array
     */
    public function searchByTitle($title)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/search/movie/title/".$title."/fuzzy";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj["results"];
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function getById($id)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/movie/".$id."/";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj;
    }
}
