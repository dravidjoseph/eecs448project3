<?php
$ID = $_POST["movieID"];

$infoUrl = "http://api-public.guidebox.com/v1.43/US/rKrgT4qOQA2NmwWX5riPZETUlqVpkuNj/show/".$ID."/";
$infoResponse = file_get_contents($infoUrl);
$infoObj = json_decode($infoResponse, true);

echo '<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Rock Chalk JayMovies</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="index.html">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="';
            if ($infoObj[poster] == "http://static-api.guidebox.com/misc/default_movie_240x342.jpg") {
              echo 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/300px-No_image_available.svg.png';
            }else{
              echo $infoObj[poster];
            }
            echo '" class="center-block img-responsive">
            <h1>',$infoObj[title],'</h1>
            <p></p>
            <p>',$infoObj[overview],'</p>
            <p></p>
          </div>
          <div class="col-md-8">
            <h1>How can you watch?</h1>
            <p></p>
            <ul class="media-list">';
            echo '<li class="media">
                <a href="',$infoObj[url],'" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                <div class="media-body">
                  <h4 class="media-heading">Guidebox</h4>
                  <p><-- Visit website for more details</p>';      
              echo '</ul>
            <p></p>
          </div>
        </div>
      </div>
    </div>
</body></html>';
?>