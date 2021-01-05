<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
       
        <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">       
        <link href="https://fonts.googleapis.com/css2?family=Gugi&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark gugi fixed-top">
            <a class="navbar-brand" href="#"><img src="{{ asset( 'img/icon/Ocko.gif' ) }}" height="45px" width="45px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              @auth
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route( 'home' ) }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route( 'create_deck') }}">Create Deck</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route( 'deck_manager') }}">Manage Decks</a>
                </li>
               {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ url( 'test_deck' ) }}">Test Deck</a>
                </li>--}}
                <li class="nav-item">
                  <a class="nav-link" href="#">Store</a>
                </li>
              </ul>
    
              <span class="navbar-text">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </button>
                  <div class="dropdown-menu navbar-dark bg-dark" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile Settings</a>
                    <a class="dropdown-item" href="#">My Stuff</a>
                    <a class="dropdown-item" href="{{ route( 'logout') }}">Logout</a>
                  </div>
                </div>
              </span>
              @else 
              <span class="navbar-text">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </button>
                  <div class="dropdown-menu navbar-dark bg-dark" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route( 'register' ) }}">Register</a>                
                    <a class="dropdown-item" href="{{ route( 'login') }}">Login!</a>
                  </div>
                </div>
              </span>
              @endauth
             
    
            </div>
          </nav><br><br><br>

          <div class="container p-5">
              <div class="row">
                <div class="col">
                    <div class="container shadow-lg">
                        <img src="{{ asset('img/icon/mtg_logo.png') }}" alt="">
                    </div>                   
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <div class="container shadow-lg">
                        <h1 class="kufam">Deck Creator and Manager WebSite</h1>
                    </div>                   
                </div>
              </div>
          </div><br>
          <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="container">
                          <a href="{{ route('create_deck') }}"> <h1 class="gugi pointer">ENTER</h1></a>
                         
                      </div>
                  </div>
              </div>
          </div>
    </body>
</html>
