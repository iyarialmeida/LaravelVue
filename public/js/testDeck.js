$( document ).ready( function(){  
    
      let game = new Vue({
          el:'#game',
          data:{
              library:[],
              hand:[],
              graveyard:[],
              battlefield:[],
              life:20,
              turn:0,
              dragging:-1,
              view:{
                name:'Deck Name',
                text:'Oracle Text',
                img_uri:'/img/mtg/card.jpg'
              },
              actual:{}
          },
          ready(){
  
              this.library = deck.slice();
  
              shuffle( this.library );
  
            },
          methods:{
            reset:function(){
  
              this.life = 20;
              this.turn = 0;
              this.library = deck.slice();
              shuffle( this.library );
              this.hand = [];
              this.graveyard = [];
              this.battlefield = [];
              this.resetView();
  
            },
            dragStart:function(){
              //console.log('Drag Start');
              this.isDragging();
              //console.log(this.dragging);
            },
            dragStop:function(){
              //console.log('Drag Stop');
              this.dragging = -1;
             
            },
            isDragging:function(){
              this.dragging = 1;
            },
            overHand:function(){          
              
              draggFromLibrary( this.hand )
  
              this.dragging = -1;
  
            },
            overBattlefield:function(){

              draggFromLibrary( this.battlefield )
  
              this.dragging = -1;

            },
            stopsOnHand:function(){
              
              this.dragging = -1;
              
             
            },
            overGraveyard:function(){          
              
              draggFromLibrary( this.graveyard );
              
              this.actual = this.graveyard[ this.graveyard.length - 1 ];
  
              this.dragging = -1;
  
            },
            menuLibrary:function( e ){
  
              e.preventDefault();
              $( '#menu' ).attr( 'class', 'd-block');
            },
            menuClose:function(){
  
              $( '#menu' ).attr( 'class', 'd-none');
             
            },
            libraryshuffle:function(){
              
              shuffle( this.library );
              
            },
            showView:function( card ){
              this.view = card;
            },
            resetView:function(){ 
              this.view = {
                name:'Deck Name',
                text:'Oracle Text',
                img_uri:'/img/mtg/card.jpg'
              };
             },
            mouseW:function(e){

             if( ( this.graveyard.length - 1 ) > 0 ){
             console.log( this.graveyard.indexOf( this.actual ));
             }
              //console.log( e.wheelDeltaY );
            },
            
          }
      });
    
      function draggFromLibrary( list ){
  
        if( game.dragging == 1 && game.library.length > 0 ){
               
                let card = game.library.pop();
  
                list.push( card );
                
              }
  
      }
  
      function shuffle( array ) {
        
      var currentIndex = array.length, temporaryValue, randomIndex;
  
      // While there remain elements to shuffle...
      while (0 !== currentIndex) {
  
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
  
        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }
  
      return array;
    }
  
  });
