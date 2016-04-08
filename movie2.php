<?php

//TODO Add dynamic functions to generate a new page dynamically

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
            <img src="http://static-api.guidebox.com/060515/thumbnails_movies_medium/133474-8257560716-2693021209-7103600800-medium-240x342-alt-.jpg" class="center-block img-responsive">
            <h1>Star Wars: The Force Awakens</h1>
            <p></p>
            <p>Lucasfilm and visionary director J.J. Abrams join forces to take you back
              again to a galaxy far, far away as Star Wars returns with Star Wars: The
              Force Awakens.</p>
            <p></p>
          </div>
          <div class="col-md-8">
            <h1>How can you watch?</h1>
            <p></p>
            <ul class="media-list">
              <li class="media">
                <a href="https://itunes.apple.com/us/movie/star-wars-the-force-awakens/id1063466898?uo=4&amp;at=10laHb" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                <div class="media-body">
                  <h4 class="media-heading">iTunes</h4>
                  <p>Purchase: 14.99 (SD) 19.99 (HD)</p>
                </div>
              </li>
              <li class="media">
                <a href="http://www.amazon.com/gp/product/B019G7X8DS" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                <div class="media-body">
                  <h4 class="media-heading">Amazon</h4>
                  <p>Purchase: 14.99 (SD) 19.99 (HD)</p>
                </div>
              </li>
              <li class="media">
                <a href="http://click.linksynergy.com/fs-bin/click?id=Pz66xbzAbFo&amp;subid=&amp;offerid=251672.1&amp;type=10&amp;tmpid=9417&amp;RD_PARM1=http%3A%2F%2Fwww.vudu.com%2Fmovies%2F%23%21content%2F659626%2FStar-Wars-The-Force-Awakens" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                <div class="media-body">
                  <h4 class="media-heading">VUDU</h4>
                  <p>Purchase: 14.99 (SD) 19.99 (HD)</p>
                </div>
              </li>
            </ul>
            <p></p>
          </div>
        </div>
      </div>
    </div>
</body></html>';
?>