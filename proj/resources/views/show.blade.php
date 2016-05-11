@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{$show['artwork_304x171']}}" class="center-block img-responsive">
            <h1>{{$show['title']}}</h1>
            <p></p>
            <p>{{$show['overview']}}</p>
            <p></p>
        </div>
        <div class="col-md-8">
            <h1>How can you watch?</h1>
            <p></p>
            <ul class="media-list">
            @while ($season = current($seasons))
              <div class="panel-group" id="seasons" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading{{key($seasons)}}">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#seasons" href="#collapse{{key($seasons)}}" aria-expanded="false" aria-controls="collapse{{key($seasons)}}">
                        Season #{{key($seasons)}}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse{{key($seasons)}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{key($season)}}">
                    <div class="panel-body">
                      @foreach ($season as $episode)
                        <li class="media">
                          <div class="media-body">
                            <a href="/episode/{{$episode['id']}}"><h4 class="media-heading">{{$episode['number']}} - {{$episode['title']}}</h4></a>
                            <p>
                            </p>
                          </div>
                        </li>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <?php next($seasons) ?>
            @endwhile
            </ul>
            <p></p>
        </div>
    </div>
</div>
@endsection
