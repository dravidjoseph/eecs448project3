@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @foreach ($movies as $movie)
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="{{$movie['poster_120x171']}}" alt="...">
          <div class="caption text-center">
            <h3>{{$movie['title']}}</h3>
            <p><a href="movie/{{$movie['id']}}" class="btn btn-primary" role="button">More Information</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
