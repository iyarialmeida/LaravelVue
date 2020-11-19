$(document).ready(function(){

  let search = new Vue({
      el:'#search-div',
      data:{
          query3:''
      },
      methods:{
          goSearch:function(){
              alert('goSearch!');
          }
      }
  });

});