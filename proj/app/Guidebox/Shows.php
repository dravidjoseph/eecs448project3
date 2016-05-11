<?php

namespace App\Guidebox;

class Shows
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
     * Search for shows containing the title passed.
     *
     * @param  string   $title
     * @return array
     */
    public function searchByTitle($title)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/search/title/".$title."/fuzzy";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj["results"];
    }

    /**
     * Get the show with the specific ID passed.
     *
     * @param  int  $id
     * @return array
     */
    public function getById($id)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/show/".$id."/";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj;
    }

    /**
     * List the episodes for a specific show.
     *
     * @param  int  $id
     * @return array
     */
    public function listEpisodes($id,$start)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/show/".$id."/episodes/all/".$start."/100/all/web/false?reverse_ordering=true";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj;
    }

    /**
     * Get the epiodes organized by season.
     *
     * @param  int  $id
     * @return array
     */
    public function getSeasonEpisodes($id)
    {
        $seasons = array();
        $start = 0;
        $list = $this->listEpisodes($id,$start);
        while ($list["total_returned"] != 0) {
            foreach ($list["results"] as $episode) {
                $seasons[$episode["season_number"]][$episode["episode_number"]] = [
                    "id" => $episode["id"],
                    "number" => $episode["episode_number"],
                    "title" => $episode["title"]
                ];
            }
            $start += 100;
            $list = $this->listEpisodes($id,$start);
        }
        return $seasons;
    }

    /**
     * Get an epiode from the API.
     *
     * @param  int  $id
     * @return array
     */
    public function getEpisode($id)
    {
        $searchUrl = $this->apiUrl.$this->apiKey."/episode/".$id."/";
        $searchResponse = file_get_contents($searchUrl);
        $searchObj = json_decode($searchResponse, true);

        return $searchObj;
    }
}
