@extends('layouts.main')
@section( 'content' )
<div class="container-fluid kufam" id="game">
    <div class="row table">
        <div class="col-1 shadow-lg">
            <div class="row">
                <div class="col">
                  <small class="form-text text-muted">{{ Auth::user()->name }}</small> 
                  <img src="{{ asset( Auth::user()->profile_photo_url ) }}" class="rounded float-left" height="90%" width="90%">                 {{-- 'img/icon/profile-pic.png'--}}
                </div>
            </div><br><br>
            <div class="row">
                <div class="col">
                    Life: @{{ life }} &nbsp; 
                    <span class="badge badge-secondary btn" v-on="click: life++">+</span>
                     &nbsp; 
                     <span class="badge badge-secondary btn d-inline" v-on="click: life--">-</span> 
                     &nbsp;                     
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                   Turn: @{{ turn }} &nbsp; 
                   <span class="badge badge-secondary btn" v-on="click: turn++">+</span>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                  <img src="{{ asset( 'img/icon/green-leaf.png' ) }}" class="img-fluid img-thumbnail d-inline" height="55%" width="55%" v-if="life >= 17">
                  <img src="{{ asset( 'img/icon/yellow-leaf.png' ) }}" class="img-fluid img-thumbnail d-inline" height="55%" width="55%" v-if="life < 17 &&  life > 5">
                  <img src="{{ asset( 'img/icon/orange-leaf.jpg' ) }}" class="img-fluid img-thumbnail d-inline" height="55%" width="55%" v-if="life <= 5 && life > 0">
                  <img src="{{ asset( 'img/icon/skull.jpg' ) }}" class="img-fluid img-thumbnail d-inline" height="55%" width="55%" v-if="life <= 0">
                  <br><br>
                  <span class="badge badge-secondary badge-pill pointer"
                        v-on="click: reset()">
                     Reset </span>
                </div>
            </div><br>
        </div>
        <div class="col-9 battlefield"
        v-on="mouseover:overBattlefield(),">
          <small class="form-text text-muted">Cards in Battlefield: &nbsp; ( @{{ battlefield.length }} ) </small>
          <div class="row">
            <div class="col" v-repeat="card in battlefield">
              <div class="card pointer" style="width: 11rem;" v-on="click: showView( card )">
                <img src="@{{card.img_uri}}" class="card-img-top" height="75%" width="75%">                
              </div>
            </div>
          </div>         
        </div>
        <div class="col-2">
          <div class="card" style="width: 15rem;">
            <img src="@{{ view.img_uri }}" class="card-img-top shadow-lg" height="120%" width="120%">
            <div class="card-body scroller-card">
              <h5 class="card-title">@{{ view.name }}</h5>
              <p class="card-text">@{{ view.text }}</p>
             
            </div>
          </div>
        </div>
    </div>
    <div class="row player shadow-lg">        
        <div class="col-8">
          <ul class="list-group list-group-horizontal scroller-hand min-hand" 
          v-on="mouseover: overHand(),
                mouseup: stopsOnHand() ">
            <li class="list-group-item pointer" v-repeat="card in hand" v-on="click: showView( card )">
              <div class="card" style="width: 11rem;">
                <img src="@{{card.img_uri}}" class="card-img-top" height="75%" width="75%">                
              </div>
            </li>
                    
          </ul>
          <small class="form-text text-muted">Cards in Hands: &nbsp; ( @{{ hand.length }} ) </small>
        </div>
        <div class="col-2">
          <img src="{{ asset( 'img/mtg/card.jpg' ) }}" class="img-fluid img-thumbnail shadow pointer" height="75%" width="75%"
          v-on="mousedown: dragStart(),
                mouseup: dragStop(),
                contextmenu : menuLibrary( $event ),
                click : menuClose()">
          <small class="form-text text-muted">Cards in Library: &nbsp; ( @{{ library.length }} )</small>
          <vue-context id="menu" class="d-none" style="z-index: 2;position:absolute;">
            <ul class="list-group">
              <li class="list-group-item pointer" v-on="click : menuClose(),
                                                        click :libraryshuffle()">Shuffle Library</li>
              <li class="list-group-item">Shuffle Library</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
           
        </vue-context>
        </div>
        <div class="col-2 pointer"
            v-on="mouseover: overGraveyard(),
                  mouseup: stopsOnHand(),
                  click: showView( actual ),
                  mousewheel: mouseW($event)"
                  data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
          <img src="@{{ actual.img_uri }}" class="img-fluid img-thumbnail shadow-lg" height="75%" width="75%">
          <small class="form-text text-muted">Cards in Graveyard: &nbsp; ( @{{ graveyard.length }} ) </small>
        </div>
    </div>
</div>



@endsection