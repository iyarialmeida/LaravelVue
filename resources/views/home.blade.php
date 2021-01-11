@extends('layouts.main')
@section( 'content' )

<div class="container-fluid p-6 m-5">
  <div class="row justify-content-center">
    <div class="col offset-4">
      <h2 class="kufam">All public Decks</h2>
    </div><br>
  </div>
  <div class="row x-slider nomax">
    <div class="col"><br>
      <h3 class="gugi">Rated Over 100!</h3>
      <ul class="list-group list-group-horizontal">
        @foreach ( $over_100 as $deck )
        <li class="list-group-item">
          <div class="card" style="width: 18rem;">
            <img src="{{ $deck->img_url }}" class="card-img-top" height="75%" width="75%">
            <div class="card-body">
              <h5 class="kufam">{{ $deck->name }}</h5>
              <small class="gugi">{{ $deck->author }}</small>
              <p>Rate:{{ $deck->rate }}</p>
              <a href="#" class="modal-title kufam">Check this Deck</a>             
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row x-slider nomax">
    <div class="col"><br>
      <h3 class="gugi">Rated 70-100</h3>
      <ul class="list-group list-group-horizontal">
        @foreach ( $r70_100 as $deck )
        <li class="list-group-item">
          <div class="card" style="width: 18rem;">
            <img src="{{ $deck->img_url }}" class="card-img-top" height="75%" width="75%">
            <div class="card-body">
              <h5 class="kufam">{{ $deck->name }}</h5>
              <small class="gugi">{{ $deck->author }}</small>
              <p>Rate:{{ $deck->rate }}</p>
              <a href="#" class="modal-title kufam">Check this Deck</a>             
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row x-slider nomax">
    <div class="col"><br>
      <h3 class="gugi">Rated 40-69</h3>
      <ul class="list-group list-group-horizontal">
        @foreach ( $r30_69 as $deck )
        <li class="list-group-item">
          <div class="card" style="width: 18rem;">
            <img src="{{ $deck->img_url }}" class="card-img-top" height="75%" width="75%">
            <div class="card-body">
              <h5 class="kufam">{{ $deck->name }}</h5>
              <small class="gugi">{{ $deck->author }}</small>
              <p>Rate:{{ $deck->rate }}</p>
              <a href="#" class="modal-title kufam">Check this Deck</a>             
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row x-slider nomax">
    <div class="col"><br>
      <h3 class="gugi">Rated 39 or Less</h3>
      <ul class="list-group list-group-horizontal">
        @foreach ( $r0_29 as $deck )
        <li class="list-group-item">
          <div class="card" style="width: 18rem;">
            <img src="{{ $deck->img_url }}" class="card-img-top" height="75%" width="75%">
            <div class="card-body">
              <h5 class="kufam">{{ $deck->name }}</h5>
              <small class="gugi">{{ $deck->author }}</small>
              <p>Rate:{{ $deck->rate }}</p>
              <a href="#" class="modal-title kufam">Check this Deck</a>             
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

</div>


@endsection