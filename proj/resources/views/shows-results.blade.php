@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @foreach ($shows as $show)
      <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
          <img src="{{$show['artwork_208x117']}}" alt="...">
          <div class="caption text-center">
            <h3>{{$show['title']}}</h3>
            <p><a href="/show/{{$show['id']}}" class="btn btn-primary" role="button">More Information</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
