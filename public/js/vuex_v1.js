$( document ).ready( function(){

   
  let base_uri = 'https://api.scryfall.com';
  
  
  let vm = new Vue({ 
        el:'#mtg-vue',
        data:{
            setQuery:'',
            cardQuery:'',
            sets_list:[],
            cards_list:[],
            sets_index:'',
            one_card:{
              name:'Card-Name',
              mana_cost:'{Mana-Cost}',
              type_line:'Card-Type',
              oracle_text:'Oracel-Text',
              image_uris:
               { 
                 normal:'img/mtg/card.jpg'
                }
              
            },
            quantity:0,
            maxCards:4,
          },
        methods:{
          getSet:function( uri, index ){

            vm.sets_index = index;

            getOneSet( uri );

            },
          getCard:function( uri ){

            $( '#numeric' ).val(0); vm.quantity = 0;

            getOneCard( uri, vm.one_card );

            },

          addToDeck:function( name, uri ){
            addToOneList( name, uri, deck.deckList, 'Main Deck' );
            /*if( vm.one_card.name == 'Card-Name' || vm.quantity == 0 ){

              alert( 'You must choose a card and quantity greater than 0 to add to your deck first.');

              return;
            }

            function inDeck( item ){
              
              return item.name == name;

            }

            let check = deck.deckList.findIndex( inDeck );
            
            
            if( check != -1 ){
              
              let qInside = deck.deckList[ check ].quantity;
              
              let sum = parseInt( vm.quantity ) + parseInt( qInside );
              
              let qActual = sum >= 5 ? 4 : sum;
            

              deck.deckList.splice( check ,1 , {
                name:name,
                quantity:qActual,
                uri:uri
              });

            }else{
              
              deck.deckList.splice( 0, 0, {
                name:name,
                quantity:vm.quantity,
                uri:uri
                });

              }              
            
              alert( name + ': added to < Main Deck >');*/
            },
          addToSide:function( name, uri ){
            addToOneList( name, uri, deck.sideList, 'Side Deck' );
            /*if( vm.one_card.name == 'Card-Name' || vm.quantity == 0 ){

              alert( 'You must choose a card and quantity greater than 0 to add to your deck first.');

              return;
            }

            function inDeck( item ){
              
              return item.name == name;

            }

            let check = deck.sideList.findIndex( inDeck );
            
            
            if( check != -1 ){
              
              let qInside = deck.sideList[ check ].quantity;
              
              let sum = parseInt( vm.quantity ) + parseInt( qInside );
              
              let qActual = sum >= 5 ? 4 : sum;
            

              deck.sideList.splice( check ,1 , {
                name:name,
                quantity:qActual,
                uri:uri
              });

            }else{
              
              deck.sideList.splice( 0, 0, {
                name:name,
                quantity:vm.quantity,
                uri:uri
                });

              }  

              alert( name + ': added to < Side Deck >');*/

            },
            addToLands:function( name, uri ){
              addToOneList( name, uri,deck.landList, 'Lands' );
              /*if( vm.one_card.name == 'Card-Name' || vm.quantity == 0 ){

                alert( 'You must choose a card and quantity greater than 0 to add to your deck first.');
  
                return;
              }
  
              function inDeck( item ){
                
                return item.name == name;
  
              }
  
              let check = deck.landList.findIndex( inDeck );
              
              
              if( check != -1 ){
                
                let qInside = deck.landList[ check ].quantity;
                
                let sum = parseInt( vm.quantity ) + parseInt( qInside );
                
                let qActual = sum >= 21 ? 20 : sum;
              
  
                deck.landList.splice( check ,1 , {
                  name:name,
                  quantity:qActual,
                  uri:uri
                });
  
              }else{
                
                deck.landList.splice( 0, 0, {
                  name:name,
                  quantity:vm.quantity,
                  uri:uri
                  });
  
                } 

                alert( name + ': added to < Lands >');*/
            }
          },
        computed:{
       
        },
        ready(){

          this.sets_list.push({
            name:'Loading...',
            icon_svg_uri:'img/icon/loading.gif'
          });

          getSets();

        },
         
         
    })
//-------------------------------------------------
let deck = new Vue({
  el:'#deck',
  data:{
    deckList:[],
    sideList:[],
    landList:[],
    deckIndex:null,
    sideIndex:null,
    landIndex:null,
    viewCard:{
      name:'Card-Name',
      mana_cost:'{Mana-Cost}',
      type_line:'Card-Type',
      oracle_text:'Oracel-Text',
      image_uris:{ 
           normal:'img/mtg/card.jpg'
          }
    }
  },
  methods:{
    getView:function( uri, index, section ){

      deck.deckIndex = null;
      deck.sideIndex = null;
      deck.landIndex = null;

      switch ( section ){

        case 'deck':
          deck.deckIndex = index;
          break;

        case 'side':
          deck.sideIndex = index;
          break;

        case 'land':
            deck.landIndex = index;
          break;
      
        default:
          break;
      }
      getOneCard( uri, deck.viewCard );
      //ViewTheCard( uri );
    }
  }
});

//--------------------------------------------------


function getSets(){

  axios.get( base_uri + '/sets' ).then(function (response) {
    
    vm.sets_list = response.data.data;

  })

}


function getOneSet( uri ){

  
  vm.cards_list =[{
    name:'Loading',
    image_uris:{
      small:'img/icon/loading.gif'
    },
  }];

  axios.get( uri ).then(function (response) {    
   
   let first = response.data.data;

    if( response.data.has_more ){
    
      axios.get( response.data.next_page ).then(function ( answer ) {
            
      let all = first.concat( answer.data.data );

      vm.cards_list = all;

       })

    }else{

      vm.cards_list = first;

    }

  })

}

function getOneCard( uri, theView ){

  theView = {
    name:'Loading...',
    mana_cost:'Loading...',
    type_line:'Loading...',
    oracle_text:'Loading...',
    image_uris:
     { 
       normal:'img/icon/loading.gif'
      }
    
  }
  
  axios.get( uri ).then(function (response) {
        
    theView = response.data;

  })

}


//--------------------------------------

function addToOneList( name, uri, theList, listType ){

  if( vm.one_card.name == 'Card-Name' || vm.quantity == 0 ){

    alert( 'You must choose a card and quantity greater than 0 to add to your deck first.');

    return;
  }

  function inDeck( item ){
    
    return item.name == name;

  }

  let check = theList.findIndex( inDeck );
  
  
  if( check != -1 ){
    
    let qInside = theList[ check ].quantity;
    
    let sum = parseInt( vm.quantity ) + parseInt( qInside );

    let over = listType == 'Lands' ? 21 : 5;

    let min = listType == 'Lands' ? 20 : 4;
    
    let qActual = sum >= over ? min : sum;
  

    theList.splice( check ,1 , {
      name:name,
      quantity:qActual,
      uri:uri
    });

  }else{
    
    theList.splice( 0, 0, {
      name:name,
      quantity:vm.quantity,
      uri:uri
      });

    }              
  
    alert( name + ': added to < ' + listType + ' >');

}


});