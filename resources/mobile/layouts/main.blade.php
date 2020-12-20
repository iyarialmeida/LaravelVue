<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue/0.12.16/vue.min.js"></script>

    @if( Request::is( 'create_deck' ) )
    {{--<script src="{{ asset( 'js/vuex.js' ) }}" type="text/javascript"></script>--}}
    
    @endif

    @if( Request::is( 'save_deck' ) )
    
    @endif

    @if( Request::is( 'test_deck/*' ) )
    
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gugi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset( 'css/styles.css' ) }}">
    
    <title>MTG:Work-Shop</title>
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
    @yield('content')
</body>
</html>