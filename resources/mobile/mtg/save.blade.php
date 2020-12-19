@extends('layouts.main')
@section( 'content' )
<div class="container-fluid kufam">
    <div class="row shadow-lg p-3 mb-5 bg-white rounded"> 
        <div class="col-3">
            <form>
                <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Name">
                      <small id="emailHelp" class="form-text text-muted">The name of this Deck</small>
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Last name">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                  </div>
              </form>
        </div>
        <div class="col-3">
            The name od Deck: Name
            Size: 60
        </div>
    </div>
    <div class="row">
        <div class="col-3">
          <ul class="list-unstyled rounded scroller shadow">
            @foreach ( $deck as $decky )
            <li class="media card-hover">
                <img src="{{ asset( 'img/mtg/card.jpg' ) }}" class="align-self-start mr-3" height="35%" width="35%">
                <div class="media-body">
                <h6 class="mt-0 mb-1">{{ $decky->name }} - ( x{{ $decky->quantity }} )</h6>
                texto de cartas
                </div>
            </li><br>
            @endforeach                      
         </ul>
        </div>
        <div class="col-3">
          <ul class="list-unstyled rounded scroller shadow">
            @foreach ( $side as $sidy )
            <li class="media card-hover">
                <img src="{{ asset( 'img/mtg/card.jpg' ) }}" class="align-self-start mr-3" height="35%" width="35%">
                <div class="media-body">
                <h6 class="mt-0 mb-1">{{ $sidy->name }} - ( x{{ $sidy->quantity }} )</h6>
                texto de cartas
                </div>
            </li><br>
            @endforeach 
            </ul>
        </div>
        <div class="col-3">
          <ul class="list-unstyled rounded scroller shadow">
            @foreach ( $lands as $land )
            <li class="media card-hover">
                <img src="{{ asset( 'img/mtg/card.jpg' ) }}" class="align-self-start mr-3" height="35%" width="35%">
                <div class="media-body">
                <h6 class="mt-0 mb-1">{{ $land->name }} - ( x{{ $land->quantity }} )</h6>
                texto de cartas
                </div>
            </li><br>
            @endforeach 
            </ul>
        </div>
        <div class="col-3">
            <div class="card shadow-lg" style="width: 18rem;">
                <img src="{{ asset( 'img/mtg/card.jpg' ) }}" class="card-img-top">
                <div class="card-body">
                  <h6 class="card-title">Card title</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection