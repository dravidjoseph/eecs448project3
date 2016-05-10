<?php


function tableMovies()
{
    $numinList = 6;
    $movieListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/movies/all/0/".$numinList."/all/all";
    $movieListResponse = file_get_contents($movieListUrl);
    $movieListObj      = json_decode($movieListResponse, true);
    
    echo '<tr>';
    for ($i = 0; $i < $numinList; $i++) {
        echo '<td><a href="movieInfo.php? id= ',$movieListObj[results][$i][id],' " ><img src = "', $movieListObj[results][$i][poster_240x342],'" class = "posters"/></a></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < $numinList; $i++) {
        echo '<td>', $movieListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

function tableShows()
{
    $numinList = 6;
    $showListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/shows/all/0/".$numinList."/all/all";
    $showListResponse = file_get_contents($showListUrl);
    $showListObj      = json_decode($showListResponse, true);
    echo '<tr>';
    for ($i = 0; $i < $numinList; $i++) {
        echo '<td><a href="showInfo.php? id= ',$showListObj[results][$i][id],' " ><img src = "', $showListObj[results][$i][artwork_208x117], '" class = "posters" /></a></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < $numinList; $i++) {
        echo '<td>', $showListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

?>
