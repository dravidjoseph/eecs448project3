<?php
// Base API URL : http://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/

$searchInput = urlencode($_POST["input"]);


$searchUrl = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/search/movie/title/$searchInput/fuzzy";

$searchResponse = file_get_contents($searchUrl);
$searchObj = json_decode($searchResponse, true);

 echo '<html><head>
      </head><body>';
$i = 0; 
   
while (isset($searchObj[results][$i][title])) {	
	echo '<form action="movieInfo.php" method="post">
        ',$searchObj[results][$i][title],'<input type="text" hidden value="',$searchObj[results][$i][id],'" name="movieID" ><br>
        <input type="submit" value = "More Information">
    </form>';
	$i++;
}

echo '</body></html>';
?>
