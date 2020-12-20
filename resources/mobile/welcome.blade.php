@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row justify-content-sm-center align-items-center  main_logo_container">
    <div class="col-1"></div>
      <div class="col-4 align-self-center">
          <img src="{{asset('img/icon/mtg_logo.png')}}" width="300%" height="300%">
      </div>
  </div>
  <div class="row ">
    
      <div class="col-4 align-self-center">
          <h5 class="gugi">MTG Deck Creator</h5>
      </div>
      <div class="col-4 align-self-center">
        <a class="nav-link" href="{{ route('home') }}"><h5 class="gugi">Enter!</h5></a>
        
    </div>
  </div>
</div>
@endsection

