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
            has_more:false
            
           
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
            getNext:function(){
              
              search.actual_index++;
              if( search.actual_index <= (search.archive.length -1)){
                nextResults(search.archive[search.actual_index]);
              }else{
                alert('There is no more Results.');
              }
             
            },
            getPrev:function(){

              if(search.actual_index > 0){

                  search.actual_index--;

                  nextResults(search.archive[search.actual_index]);
              }else{
                alert('This is the start.');
              }
              
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
    selectus:"",
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
    },
    changeSelectus:function(){
      $('#sendPortrait').val(this.selectus);      
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
      selected_color:[],
      selected_card_type:'',
      selected_catalog:'',
      catalog:[],
      selected_oracle_type:'',
      oracle_catalog:[],
      oracle_selected:[],
      selected_rarity:'',
      mana_cost:[],
      selected_mana:'',
      word:'',
      archive:[],
      actual_index:0
  },
  methods:{         
      searchByString:function(title){
        setOneCard()
        autoComplete(title,'/cards/named');
      },
      applySearch:function(){
        vm.cards_list =[{
          name:'Loading',
          image_uris:{
            small:'img/icon/loading.gif'
          },
        }];
        setOneCard()
        searchByParams();
      },
      addOracle:function( oracle ){
        function checkOracle(text) {
          return text == oracle ;
        }
        this.oracle_selected.find(checkOracle);
        if(this.oracle_selected.find(checkOracle)){
          alert( "word:"+oracle+"is already in list.");
         
        }else{this.oracle_selected.push( oracle );}
        
      },
      removeOracle:function( index ){
        this.oracle_selected.splice( index, 1 );
      },
      addMana:function(cost){
        if(this.mana_cost.length < 7){this.mana_cost.push(cost);} 
              
      },
      removeSelectedMana:function( index ){
        this.selected_mana.splice( index, 1 );
      },
      removeManaCost: function( index ){
        this.mana_cost.splice( index, 1 );
      },
      resetManaCost:function(){
        
        this.mana_cost = [];
        this.selected_color = [];
      },
      resetSelectedColor:function(){
        this.mana_cost = [];
        
      },
      resetSearch:function(){
        this.query3 = '';
        this.query_result = [];
        this.selected = '';
        this.result_card = {};
        this.selected_color = [];
        this.selected_card_type = '';
        this.selected_catalog = '';
        this.catalog = [];
        this.selected_oracle_type = '';
        this.oracle_catalog = [];
        this.oracle_selected = [];
        this.selected_rarity = '';
        this.mana_cost = [];
        this.selected_mana = '';
        this.word = '';
      }
  }
});



search.$watch('query3', function (val) {
  search.selected='';
autoComplete(val,'/cards/autocomplete');
})

search.$watch('selected_card_type', function (val) {
  search.selected_catalog='';
  this.catalog = [];
  if(val){getCatalog(val);}
  
  })

  search.$watch('selected_oracle_type', function(val){  
    search.oracle_catalog = [];
      search.oracle_selected = [];  
    if(val){getOracleCatalog(val);}
    })

//--------------------------------------------------

/********************************* */

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

  setOneCard();
  
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
            vm.cards_list = [];
              vm.one_card =response.data;
          }
          
      });  

}
//------------------------------------------------------------------------------------
function searchByParams(){ 

  setOneCard();
  
  search.archive = [];
  search.actual_index = 0;
  vm.has_more=false;

    let type = search.selected_card_type ? 't:' + search.selected_card_type : '';
    let catalog = search.selected_catalog ? 't:' + search.selected_catalog : '';
    let allColors = '';

    if( search.selected_color.length > 0 ){
      
      let allCol = 'c:';

      search.selected_color.forEach( color => {
        
         allCol += color;

      });

      allColors += '+' + encodeURIComponent (allCol );
    }
    
    let all_oracles = '';
    

    if( search.oracle_selected.length > 0 ){

        search.oracle_selected.forEach( oracle => {
          
          all_oracles+='+' + encodeURIComponent( 'o:' + oracle) ;
      });

    }

    let rarity = search.selected_rarity ? 'r:' +search.selected_rarity: '';
    let mana_cost_compo = '';

    if( search.selected_mana ){
      
      mana_cost_compo += search.selected_mana;

    }

    if( search.mana_cost.length > 0 ){

      search.mana_cost.forEach( element => mana_cost_compo += element );

    }

    let uriComp = '';

    if(type){
      uriComp += '+'+ encodeURIComponent( type );
    }
    if(catalog){
      uriComp +='+'+ encodeURIComponent( catalog );
    }
    if(allColors){
      uriComp+=allColors;
    }
    if(all_oracles){
      uriComp+=all_oracles;     
    }
    if(rarity){
      uriComp+='+'+ encodeURIComponent( rarity );
    } 

    if(mana_cost_compo){
      uriComp+='+'+ encodeURIComponent( 'm:' + mana_cost_compo );
    } 
        
    if( search.word ){
      uriComp+='+' + encodeURIComponent( 'o:"' + search.word + '"');
    }
    
    axios.get(base_uri +'/cards/search?q='+uriComp)
  .then(function (response) {
    console.log(response.data);
    if(response.data.total_cards>1){
      
      vm.cards_list = response.data.data;
      defaultOneCard();
    }
    if(response.data.total_cards==1){     
      
      vm.one_card = response.data.data[0];
      vm.cards_list = [];
    }

    if( response.data.has_more ){   
      vm.has_more=true;
      search.archive.push(base_uri +'/cards/search?q='+uriComp);
      search.archive.push(response.data.next_page);       
    }
    
      
  }).catch( function( error ){
   
    alert('No results were obtained, try another combination');
    defaultOneCard();
    vm.cards_list = [];
  });
 }
 //------------------------------
 function nextResults(url){

setOneCard();
vm.cards_list =[{
  name:'Loading',
  image_uris:{
    small:'img/icon/loading.gif'
  },
}];

  axios.get(url)
  .then(function (response) {
    if(response.data.total_cards>1){
      
      vm.cards_list = response.data.data;
      defaultOneCard();
    }
    if(response.data.total_cards==1){     
      
      vm.one_card = response.data.data[0];
      vm.cards_list = [];
    }
    if( response.data.has_more ){  

      vm.has_more=true;   
      search.archive.push(response.data.next_page);       
    }
  });



 }
//------------------------------------------
function getCatalog(catalog){
  if(!catalog){search.catalog=[];return;}
  axios.get(base_uri +'/catalog/'+catalog+'-types')
  .then(function (response) {  
    search.catalog=response.data.data.sort();      
  });
 
}
//------------------------------------------------------------------------

function setOneCard(){
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
}

function defaultOneCard(){
  vm.one_card = {
    name:'Card-Name',
    mana_cost:'{Mana-Cost}',
    type_line:'Card-Type',
    oracle_text:'Oracel-Text',
    image_uris:
     { 
       normal:'img/mtg/card.jpg'
      }
    
  };
}
//-------------------------------------------------------------------------------------
  function getOracleCatalog(val){

    axios.get( 'https://api.scryfall.com/catalog/' + val )
         .then( function( answer ){           
            search.oracle_catalog = answer.data.data.sort();             
       })
    
  }

//---------------------------------
});