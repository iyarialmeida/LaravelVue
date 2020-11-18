@extends('layouts.main')
@section( 'content' )
<div class="container-fluid kufam">
    <div class="row shadow-lg p-3 mb-5 bg-white rounded" id="deck">
        <div class="col-12">
                     
            <div class="collapse" id="expandible">
              <form action="{{ route( 'save_deck' ) }}" method="POST"> @csrf
              <div class="row">               
                <div class="col-3">
                  <p class="text-center notes shadow p-3 mb-5 bg-white rounded gugi">L-Click to View, R-Click to Remove from List</p>
                </div>
                <div class="col-5">
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control form-control-sm" name="name" required>
                      <small id="emailHelp" class="form-text text-muted">Epic name for this Deck</small>
                    </div>
                    <div class="col-6">
                     <input type="checkbox"  name="public" id="customSwitch1">
                     <label >Public (every user can see and rate it)</label>                     
                     <br>
                      <input type="checkbox"  name="comments">
                      <label >Allow commets</label>                      
                    </div>
                  </div>
                </div>
                <div class="col-4">                  
                  <input type="hidden" value="" id="sendDeck" name="deck" required>
                  <input type="hidden" value="" id="sendSide" name="side">
                  <input type="hidden" value="" id="sendLands" name="lands" required>
                  <input type="submit" value="Create this Deck" class="btn btn-dark" v-show="deckList.length != 0">                                    
                </div>
               
              </div> </form>
                <div class="row">
                    <div class="col-3">
                      <h4>Main Deck</h4> 
                      <div class="list-group shadow p-3 mb-5 bg-white rounded scroller">
                        <a class="list-group-item list-group-item-action pointer ahover @{{ card.name == deckIndex ? 'active' : ''}}"
                           v-repeat="card in deckList"
                           v-on="click: getView( card.uri, card.name, 'deck' ), 
                            contextmenu:remove( $index, $event, 'deckList' )"> 
                            @{{ card.name }} <span class="notes">(x@{{ card.quantity }})</span> 
                          </a>                        
                      </div>
                    </div>
                    <div class="col-3">
                      <h4>Side Deck</h4>
                        <div class="list-group shadow p-3 mb-5 bg-white rounded scroller">
                          <a class="list-group-item list-group-item-action pointer ahover @{{ card.name == sideIndex ? 'active' : ''}}"
                             v-repeat="card in sideList"
                             v-on="click: getView( card.uri, card.name, 'side' ),
                             contextmenu:remove( $index, $event, 'sideList' ) "> @{{ card.name }} <span class="notes">(x@{{ card.quantity }})</span> </a>                         
                        </div>
                      </div>
                      <div class="col-3">
                        <h4>Lands</h4>
                          <div class="list-group shadow p-3 mb-5 bg-white rounded scroller">
                            <a class="list-group-item list-group-item-action pointer ahover @{{ card.name == landIndex ? 'active' : ''}}"
                               v-repeat="card in landList"
                               v-on="click: getView( card.uri, card.name, 'land' ),
                               contextmenu:remove( $index, $event, 'landList' )"> @{{ card.name }} <span class="notes">(x@{{ card.quantity }})</span></a>                            
                          </div>
                        </div>
                    <div class="col-3">
                      <div class="tab-content" id="nav-tabContent">
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                          <img src=" @{{ one_card.image_uris.normal }} " class="card-img-top" height="90%" width="90%">
                          <div class="card-body">
                            <p class="notes"> @{{ one_card.name }} &nbsp;-&nbsp;  @{{ one_card.mana_cost }}</p>                
                            <p class="minor"> @{{ one_card.type_line }} </p>                
                            <p class="card-text"> @{{ one_card.oracle_text }} </p>                            
                          </div>                        
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class=" @{{ expanded ? 'btn-group dropup' : 'none'}}">
              <a class="dropdown-toggle btn btn-light active" data-toggle="collapse" href="#expandible" role="button" aria-expanded="true" aria-controls="collapseExample"
              v-on="click: expansorToggle()">
                Selected Cards  
            </a> 
            </div>
            
        </div>
    </div>
    <div class="row" id="mtg-vue">
        <div class="col-lg-4">
          <h4>MTG Sets</h4>
            <div class="container-fluid">
              <input class="form-control form-control-sm shadow p-3 mb-5 bg-white rounded" type="text" placeholder="Filter Set-List" v-model="setQuery">
              <div class="list-group shadow p-3 mb-5 bg-white rounded scroller" role="tablist">
                <a 
                  class="list-group-item list-group-item-action pointer ahover @{{ set.name == sets_index ? 'active' : ''}}"
                  v-repeat="set in sets_list | filterBy setQuery in 'name'"
                  v-on="click: getSet( set.search_uri, set.name )">
                  <div class="d-inline p-3"> @{{ set.name }}</div>
                  <div class="d-inline p-3"><img src="@{{ set.icon_svg_uri }}" height="30em" width="30em"></div>               
                </a>                
              </div>
            </div>
        </div>
        <div class="col-lg-5">
            <h4 class="d-inline p-2">Card List</h4>  <a class="nav-link d-inline p-2" href="" data-toggle="modal" data-target="#search-modal">Advanced Search</a>
            <div class="container-fluid">
              <input class="form-control form-control-sm shadow p-3 mb-5 bg-white rounded" type="text" placeholder="Filter Card-List" v-model="cardQuery">
              <div class="list-group shadow p-3 mb-5 bg-white rounded scroller" role="tablist">              
                <div class="media card-hover"
                    class="list-group-item list-group-item-action pointer ahover"
                    v-repeat="card in cards_list | filterBy cardQuery in 'name'"
                    v-on="click: getCard( card.uri )">
                  <img src="@{{ card.image_uris.small }}" class="align-self-start mr-3" height="20%" width="20%">
                  <div class="media-body">
                    <h5 class="mt-0"> @{{ card.name }}</h5>
                    <h6> @{{ card.mana_cost }} </h6>
                    <h6 class="notes"> @{{ card.type_line }} </h6>
                    <p> @{{ card.oracle_text }} </p>                  
                  </div>
                </div>                
              </div>
            </div>
        </div>
        <div class="col-lg-2">
            <h4>Card Review</h4>
            <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 19rem;">
              <img src=" @{{ one_card.image_uris.normal }} " class="card-img-top" height="70%" width="70%">
              <div class="card-body">
                <p class="notes"> @{{ one_card.name }} &nbsp;-&nbsp;  @{{ one_card.mana_cost }}</p>                
                <p class="minor"> @{{ one_card.type_line }} </p>                
                <p class="card-text"> @{{ one_card.oracle_text }} </p>
              </div>             
              <div class="card-footer">
                <div class="row">
                  <div class="col-7">
                    <a href="#" class="card-link minor" v-show="!one_card.type_line.includes( 'Land' )" v-on="click: addToDeck( one_card.name, one_card.uri )">Add to Deck</a><br>
                    <a href="#" class="card-link minor" v-show="!one_card.type_line.includes( 'Land' )" v-on="click: addToSide( one_card.name, one_card.uri )">Add to Side Deck</a><br>
                    <a href="#" class="card-link minor" v-show="one_card.type_line.includes( 'Land' )" v-on="click: addToLands( one_card.name, one_card.uri )">Add to Lands</a>
                  </div>
                  <div class="col-5">
                    Quantity
                    <input class="form-control form-control-sm shadow p-3 mb-5 bg-white rounded"
                    id="numeric" 
                    type="number"  
                    v-attr="min:1, max: one_card.type_line.includes( 'Basic Land' ) ? 20 : 4" 
                    v-model="quantity">
                  </div>
                </div>
                
              </div>
            </div>
        </div>
    </div>
</div>

@include( 'components.search-modal' )
@endsection