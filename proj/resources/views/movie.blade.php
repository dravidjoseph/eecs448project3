@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{$movie['poster_240x342']}}" class="center-block img-responsive">
            <h1>{{$movie['title']}} ({{$movie['release_year']}})</h1>
            <p>Length: {{gmdate("H:i:s",$movie['duration'])}}</p>
            <p>{{$movie['overview']}}</p>
            <p></p>
        </div>
        <div class="col-md-8">
            <h1>How can you watch?</h1>
            <p></p>
            <ul class="media-list">
              @if ($movie['purchase_web_sources'] != null)
                @foreach ($movie['purchase_web_sources'] as $source)
                <li class="media">
                  <a href="{{$source['link']}}" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading">{{$source['display_name']}}</h4>
                    <p>
                      @if ($source['formats'] != null)
                        @foreach ($source['formats'] as $option)
                          - {{ucfirst($option['type'])}}: $ {{$option['price']}} ({{$option['format']}}) 
                        @endforeach
                      @else
                        <-- Visit website for more details
                      @endif
                    </p>
                  </div>
                </li>
                @endforeach
              @else
              <p>
                @if ($movie['subscription_web_sources'] != null)
                  {{$movie['subscription_web_sources'][0]['source']}}{{$movie['subscription_web_sources'][0]['display_name']}}{{$movie['subscription_web_sources'][0]['link']}}
                @else
                  No subcription information
                @endif
              </p>
              @endif
            </ul>
            <p></p>
        </div>
    </div>
</div>
@endsection