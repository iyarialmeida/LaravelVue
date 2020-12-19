@extends('layouts.main')
@section( 'content' )

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="p7 ml-3 link-light gugui">All your Decks!</h3>
        </div>
    </div><hr>
    <div class="row">
        <div class="col-6 p7">
            <ul class="list-group list-group-flush">               
            @foreach ( $all_decks as $deck) 
                <li class="list-group-item ml-3 shadow-lg">
                    {{ $deck->name }}
                     &nbsp;&nbsp;&nbsp;
                    <span class="badge badge-secondary badge-pill"> Rate: {{ $deck->rate }} </span>
                    &nbsp;&nbsp;&nbsp;
                    @if( $deck->comments)
                    <span class="badge badge-dark badge-pill pointer">See Comments</span>
                    @endif                  
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route( 'tester', [ 'name' => strtolower( $deck->name ) ] )}}" class="link-light">Test this Deck</a>
                    &nbsp;&nbsp;&nbsp;
                    @if( $deck->public)
                    <small class="text-muted">Shown in Public</small>
                    @endif
                </li><br>
            @endforeach
            </ul>           
        </div>
        <div class="col-4 p7">
            <ul class="list-group list-group-flush shadow-lg scroller">     
              <li class="list-group-item ahover">
                  <small class="text-muted">User name</small>
                  <p>Comments</p>
            </li>
            </ul>
        </div>
    </div>
</div>

@endsection