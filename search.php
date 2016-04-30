<?php
// Base API URL : http://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/

 $searchInput = $_POST["input"];
 $encodedInput = urlencode($searchInput);

$jsonurl = "https://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/search/movie/title/$encodedInput/fuzzy";
$response = file_get_contents($jsonurl);
$jsonobj  = json_decode($response, true);
var_dump($jsonobj);
$i = 0;
while ($jsonobj[results][$i][id] != null) {
	$id = $jsonobj[results][$i][id];
	echo $id."<br>";
	$i++;
}
	


//$jsonobj  = json_decode($response);
//$id =  $jsonobj->results[0]->id;

 ?>
