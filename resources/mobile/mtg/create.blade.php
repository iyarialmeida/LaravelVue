@extends('layouts.main')
@section( 'content' )
<div class="container-fluid kufam p-3">
  <div class="row">
    <div class="col-8 offset-4">Build Your Deck</div>           
  </div><br>
  <div class="row">
    <div class="col-8 offset-4">
      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
        Advanced Search
      </button>
    </div>
  </div><br>
  <div class="row">
    <div class="col-12 align-self-center">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#select-set" aria-expanded="true" aria-controls="select-set">
                Sets List
              </button>
            </h2>
          </div>
      
          <div id="select-set" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="list-group shadow">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#select-card" aria-expanded="false" aria-controls="select-card">
                Cards List
              </button>
            </h2>
          </div>
          <div id="select-card" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="list-group shadow">

                <li class="list-group-item">
                  <div class="media">
                  <img src="{{asset('img/mtg/card.jpg')}}" class="align-self-start mr-3" height="50%" width="50%">
                    <div class="media-body">
                      <p>Card Name</p>
                      <p>Card Type</p>
                      <p>Mana Cost</p>   
                      <a href="#" class="card-link d-block">View Card</a>                  
                    </div>
                  </div>
                </li>
                         
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#card-view" aria-expanded="false" aria-controls="card-view">
                Card View
              </button>
            </h2>
          </div>
          <div id="card-view" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="card d-block" style="width: 18rem;">
                    <img src="{{asset('img/mtg/card.jpg')}}" class="card-img-top">
                    <div class="card-body d-block d-sm-none shadow">                      
                      <h5>Card Name</h5>
                      <h6 class="d-inline">Mana Cost</h6> &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<h6 class="d-inline">Card Types</h6><br><br>
                      <p class="card-text">Oracle Text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                      <p class="card-text"><a href="#" class="card-link d-inline">Add to Deck</a>
                        <a href="#" class="card-link d-inline">Add to Side-Deck</a>
                        <a href="#" class="card-link d-inline">Add to Lands</a></p>                                                          
                    </div>
                  </div>
                </div>
                <div class="col d-none d-sm-inline shadow">
                  <h3>Card Name</h3>
                  <h5 class="d-inline">Mana Cost</h5> &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<h5 class="d-inline">Card Types</h5><br><br>
                  <p class="card-text">Oracle Text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                  <a href="#" class="card-link d-inline">Add to Deck</a>
                  <a href="#" class="card-link d-inline">Add to Side-Deck</a>
                  <a href="#" class="card-link d-inline">Add to Lands</a>
                </div>
              </div>
            
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingChoosen">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#choosen-cards" aria-expanded="false" aria-controls="choosen-cards">
                Your Deck
              </button>
            </h2>
          </div>
          <div id="choosen-cards" class="collapse" aria-labelledby="headingChoosen" data-parent="#accordionExample">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <h6>Main Deck</h6><br>
                  <ul class="list-group shadow">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-6"><br class="d-block d-sm-none">
                  <h6>Lands</h6><br>
                  <ul class="list-group shadow">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-6"><br>
                  <h6>Side Deck</h6><br>
                  <ul class="list-group shadow">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-6"><br>
                  <h6>Check Card</h6><br>
                  <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/mtg/card.jpg')}}" class="card-img-top">
                   
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
@include('../components/modal_search')
@endsection