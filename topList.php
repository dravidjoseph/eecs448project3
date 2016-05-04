<?php

function tableMovies()
{
    $movieListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/movies/all/1/10/all/all";
    $movieListResponse = file_get_contents($movieListUrl);
    $movieListObj      = json_decode($movieListResponse, true);
    $numMovies = 6;
    echo '<tr>';
    for ($i = 0; $i < $numMovies; $i++) {
        echo '<td><a href="movieInfo.php? id= ',$movieListObj[results][$i][id],' " ><img src = "', $movieListObj[results][$i][poster_240x342],'" class = "posters"/></a></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < $numMovies; $i++) {
        echo '<td>', $movieListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

function tableShows()
{
    $showListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/shows/all/1/10/all/all";
    $showListResponse = file_get_contents($showListUrl);
    $showListObj      = json_decode($showListResponse, true);
    $numShows = 6;
    echo '<tr>';
    for ($i = 0; $i < $numShows; $i++) {
        echo '<td><a href="showInfo.php? id= ',$showListObj[results][$i][id],' " ><img src = "', $showListObj[results][$i][artwork_208x117], '" class = "posters" /></a></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < $numShows; $i++) {
        echo '<td>', $showListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

?>
