@extends('layouts.main')
@section('content')
    <div class="container p-3 kufam">
        <div class="row">
            <div class="col-8 offset-4">Most Voted Decks</div>            
        </div><br>
        <div class="row">
            <div class="col-10 offset-1">
                <ul class="list-group">
                    <li class="list-group-item shadow">
                        Over 100 votes!
                        <br>
                        <div id="ro100" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#ro100" data-slide-to="0" class="active"></li>
                              <li data-target="#ro100" data-slide-to="1"></li>
                              <li data-target="#ro100" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset( 'img/wallpapper/01.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5 style="color: white;">Deck Name</h5>
                                  <p>Author:Fulanos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset( 'img/wallpapper/02.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Menganos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/08/02/126844/58cb8efd698922526778e3fabbcd0b65-700.jpg" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Sultanos.</p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#ro100" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#ro100" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </li><br>
                    <li class="list-group-item shadow">Rated 60 - 99 Votes <br>
                        <div id="r60-90" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#r60-90" data-slide-to="0" class="active"></li>
                              <li data-target="#r60-90" data-slide-to="1"></li>
                              <li data-target="#r60-90" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset( 'img/wallpapper/01.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Deck Name</h5>
                                  <p>Author:Fulanos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset( 'img/wallpapper/02.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Menganos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/08/02/126844/58cb8efd698922526778e3fabbcd0b65-700.jpg" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Sultanos.</p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#r60-90" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#r60-90" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </li><br>
                    <li class="list-group-item shadow">Rated Under 60 <br>
                        <div id="ru60" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#ru60" data-slide-to="0" class="active"></li>
                              <li data-target="#ru60" data-slide-to="1"></li>
                              <li data-target="#ru60" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset( 'img/wallpapper/01.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Deck Name</h5>
                                  <p>Author:Fulanos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset( 'img/wallpapper/02.jpg') }}" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Menganos.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/08/02/126844/58cb8efd698922526778e3fabbcd0b65-700.jpg" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Deck Name</h5>
                                    <p>Author:Sultanos.</p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#ru60" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#ru60" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </li>
                    
                  </ul>
            </div>            
        </div>
    </div>
@endsection

{{-- 
     
    --}}