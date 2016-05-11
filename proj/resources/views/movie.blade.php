@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{$movie['poster_240x342']}}" class="center-block img-responsive">
            <h1>{{$movie['title'] ($movie['release_year'])}}</h1>
            <p></p>
            <p>Length: {{gmdate("H:i:s",$movie['duration'])}}</p>
            <p>{{$movie['overview']}}</p>
            <p></p>
        </div>
        <div class="col-md-8">
            <h1>How can you watch?</h1>
            <p></p>
            <ul class="media-list">
              @foreach ($movie['purchase_web_sources'] as $source)
              <li class="media">
                <a href="{{$source['link']}}" class="pull-left" target="_blank"><i class="fa fa-3x fa-fw fa-play-circle"></i></a>
                <div class="media-body">
                  <h4 class="media-heading">{{$source['display_name']}}</h4>
                  <p>
                  	@foreach ($source['formats'] as $option)
                  		- {{ucfirst($option['type'])}}: $ {{$option['price']}} ({{$option['format']}}) 
                  	@endforeach
                  </p>
                </div>
              </li>
              @endforeach
            </ul>
            <p></p>
        </div>
    </div>
</div>
@endsection
