<?php
// Base API URL : http://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/

//$searchInput = urlencode($_POST["input"]);

// $searchUrl = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/search/movie/title/$searchInput/fuzzy";
$searchUrl = "search.json";
$searchResponse = file_get_contents($searchUrl);
$searchObj = json_decode($searchResponse, true);

 echo '<html><head>
      </head><body>';
$i = 0;
while (isset($searchObj[results][$i][title])) {
	echo '<a href= "movieInfo.php">',$searchObj[results][$i][title],'<br></a>';
	$i++;
}

echo '</body></html>';


// $jsonobj  = json_decode($response);
// $id =  $jsonobj->results[0]->id;

 ?>
