$( document ).ready( function(){

  var base_uri = 'https://api.scryfall.com';  

   
  var vm = new Vue({ 
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

            getOneCard( uri, vm );

            },

          addToDeck:function( name, uri ){

            addToOneList( name, uri, deck_obj.deckList, 'Main Deck' );
            
           

            },
          addToSide:function( name, uri ){

            addToOneList( name, uri, deck_obj.sideList, 'Side Deck' );            

           

            },
          addToLands:function( name, uri ){
              
            addToOneList( name, uri, deck_obj.landList, 'Lands' );

           
           
            },
          
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
         
         
    });
    
//-------------------------------------------------
let deck_obj = new Vue({
  el:'#deck',
  data:{
    deckList:[],
    sideList:[],
    landList:[],
    deckIndex:null,
    sideIndex:null,
    landIndex:null,
    expanded:false,
    one_card:{
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

      deck_obj.deckIndex = null;
      deck_obj.sideIndex = null;
      deck_obj.landIndex = null;

      switch ( section ){

        case 'deck':
          deck_obj.deckIndex = index;
          break;

        case 'side':
          deck_obj.sideIndex = index;
          break;

        case 'land':
            deck_obj.landIndex = index;
          break;
      
        default:
          break;
      }
      getOneCard( uri, deck_obj );
      
    },
    remove:function( index, e, wList ){
      
      e.preventDefault();

      deck_obj[ wList ].splice( index, 1 );
      
    },
    expansorToggle:function(){
      deck_obj.expanded = !deck_obj.expanded;
    }
  },
  
});


let search = new Vue({
  el:'#search-div',
  data:{
      query3:'',
      query_result:[],
      selected:'',
      result_card:{},
      selected_color:'',
      selected_card_type:'',
      selected_catalog:'',
      catalog:[]
  },
  methods:{         
      searchByString:function(title){
        vm.one_card = {
          name:'Loading...',
          mana_cost:'Loading...',
          type_line:'Loading...',
          oracle_text:'Loading...',
          image_uris:
           { 
             normal:'img/icon/loading.gif'
            }
          
        };
        autoComplete(title,'/cards/named');
      },
      colorSearch:function(){
        searchByColor(this.selected_color);
      }
  }
});

search.$watch('query3', function (val) {
  search.selected='';
autoComplete(val,'/cards/autocomplete');
})

search.$watch('selected_card_type', function (val) {
  search.selected_catalog='';
  getCatalog(val);
  })

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

  theView.one_card = {
    name:'Loading...',
    mana_cost:'Loading...',
    type_line:'Loading...',
    oracle_text:'Loading...',
    image_uris:
     { 
       normal:'img/icon/loading.gif'
      }
    
  };
  
  axios.get( uri ).then(function (response) {
        
    theView.one_card = response.data;

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
    
    switch( listType ){

      case 'Main Deck':

        $( '#sendDeck' ).val( JSON.stringify( theList ) );
      
        break;

      case 'Side Deck':

        $( '#sendSide' ).val( JSON.stringify( theList ) );
      
        break;

      case 'Lands': 

      $( '#sendLands' ).val( JSON.stringify( theList ) );

        break;

      default: break;
      
    }
    
    $( '#expandible' ).attr( 'class', 'collapse show' );

}
//----------------------------------------------------------------------------------
function autoComplete(text,url){
  if(!text){search.query_result = [];return;}      let params = url=='/cards/autocomplete' ? {q:text} : {fuzzy:text};
     
      axios.get(base_uri + url, {
          params: params
      })
      .then(function (response) {
          
          if(url=='/cards/autocomplete'){
              search.query_result = response.data.data;
          }else{
             
              vm.one_card =response.data;
          }
          
      });
 
  

}
//------------------------------------------------------------------------------------
function searchByColor(param){ 
    console.log( encodeURIComponent('c:green'));
    axios.get(base_uri +'/cards/search?q='+encodeURIComponent('c:'+param))
  .then(function (response) {
  
    console.log(response.data);
      
  });
 }
//------------------------------------------
function getCatalog(catalog){
  if(!catalog){search.catalog=[];return;}
  axios.get(base_uri +'/catalog/'+catalog+'-types')
  .then(function (response) {  
    search.catalog=response.data.data;      
  });
 
}
//------------------------------------------------------------------------
});