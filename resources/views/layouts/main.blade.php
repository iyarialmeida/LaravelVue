<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    {{-- CDN Scripts --}}
    <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue/0.12.16/vue.min.js"></script>
    {{-- Project scripts --}}
    @if( Request::is( 'create_deck' ) )
    <script src="{{ asset( 'js/vuex.js' ) }}" type="text/javascript"></script>
    <script src="{{ asset( 'js/search_card.js' ) }}" type="text/javascript"></script>
    @endif

    @if( Request::is( 'save_deck' ) )
    <script src="{{ asset( 'js/saveDeck.js' ) }}" type="text/javascript"></script>
    @endif

    @if( Request::is( 'test_deck/*' ) )
    <script type="text/javascript"> const  deck = @json( $deck ); </script>
    <script type="text/javascript" src="{{ asset( 'js/testDeck.js' ) }}"></script>
    @endif
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Gugi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet"> 
    {{-- Styles --}}   
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap_min.css') }}" >  --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset( 'css/styles.css' ) }}">
    
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark gugi fixed-top">
        <a class="navbar-brand" href="#"><img src="{{ asset( 'img/icon/Ocko.gif' ) }}" height="45px" width="45px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
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
                <a class="dropdown-item" href="{{ url( '/user/profile' ) }}">Profile Settings</a>                 
                <a class="dropdown-item" href="{{ route( 'logout') }}">Logout</a>
              </div>
            </div>
          </span>
        </div>
      </nav><br><br><br>
    @yield('content')
</body>
</html>