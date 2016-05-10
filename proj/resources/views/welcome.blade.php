@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <h1>Wanna know how to watch your favorite movie?</h1>
          <p>Check it out right now!</p>
          <br>
          <br>
          <div class="form-group input-lg" align="center">
            <div class="input-group">
              <form class="input-group" action="search" method="post">
                {{ csrf_field() }}
                <input type="text" class="form-control input-lg" placeholder="Type the movie name" name="search">
                <span class="input-group-btn">
                  <input class="btn btn-default btn-lg" type="submit" value = "Search"></input>
                </span>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
