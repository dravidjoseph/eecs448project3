<?php
// Base API URL : http://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/

$searchInput = urlencode($_POST["input"]);

$searchUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/search/movie/title/$searchInput/fuzzy";
$searchResponse = file_get_contents($searchUrl);
$searchObj      = json_decode($searchResponse, true);

$searchShowUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/search/title/$searchInput/fuzzy";
$searchShowResponse = file_get_contents($searchShowUrl);
$searchShowObj      = json_decode($searchShowResponse, true);

function printMovies($searchObj)
{
    $i = 0;
    while (isset($searchObj[results][$i][title])) {
        echo '<form action="movieInfo.php" method="post" target="_blank">
        ', $searchObj[results][$i][title], ' (', $searchObj[results][$i][release_year], ')<input type="text" hidden value="', $searchObj[results][$i][id], '" name="movieID" ><br>
        <input type="submit" value = "More Information">
    </form>';
        $i++;
    }
    
}

function printShows($searchShowObj)
{
    $i = 0;
    while (isset($searchShowObj[results][$i][title])) {
        echo '<form action="showInfo.php" method="post" target="_blank">
        ', $searchShowObj[results][$i][title], ' (', $searchShowObj[results][$i][first_aired], ')<input type="text" hidden value="', $searchShowObj[results][$i][id], '" name="movieID" ><br>
        <input type="submit" value = "More Information">
    </form>';
        $i++;
    }
}

echo '<html><head>
      </head><body>';
echo '<h>*****MOVIES*****</h>';
printMovies($searchObj);

echo '<h>*****SHOWS*****</h>';
printShows($searchShowObj);

echo '</body></html>';
?>