<?php

function tableMovies()
{
    $movieListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/movies/all/1/10/all/all";
    $movieListResponse = file_get_contents($movieListUrl);
    $movieListObj      = json_decode($movieListResponse, true);
    
    echo '<tr>';
    for ($i = 0; $i < 8; $i++) {
        echo '<td><img src = "', $movieListObj[results][$i][poster_240x342], '" height="300" /></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < 8; $i++) {
        echo '<td align="center">', $movieListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

function tableShows()
{
    $showListUrl      = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/shows/all/1/10/all/all";
    $showListResponse = file_get_contents($showListUrl);
    $showListObj      = json_decode($showListResponse, true);
    
    echo '<tr>';
    for ($i = 0; $i < 8; $i++) {
        echo '<td><img src = "', $showListObj[results][$i][artwork_208x117], '" /></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for ($i = 0; $i < 8; $i++) {
        echo '<td align="center">', $showListObj[results][$i][title], '</td>';
    }
    echo '</tr>';
}

?>