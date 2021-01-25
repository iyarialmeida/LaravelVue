<div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" id="search-div">
        <div class="modal-header">
        <h5 class="modal-title kufam" id="exampleModalLabel">Advanced Search </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-4">             
              <div class="input-group mb-2">               
                <input type="text" class="form-control" placeholder="Card Name"  v-model="query3 | lowercase" debounce="500">
              </div>
            </div>
            <div class="col" v-show="query3.length > 0 && query_result.length > 0">Do you Mean...            
              <select v-model="selected" options="query_result">
                <option value="">maybe...</option>
              </select> &nbsp;&nbsp;
              <span> <a href="#" class="btn btn-light active d-inline" v-on="click:searchByString(selected)"> Yes! </a></span>
            </div>
          </div><br>
          <div class="row">
            <div class="container"><h6 class="kufam modal-title">Card Types:</h6></div>
            <div class="col-4">
              <div class="input-group mb-2">               
                <select class="form-control" v-model="selected_card_type" v-on="change:resetManaCost()">
                  <option value="">Select a Card Type</option>
                  <option value="artifact">Artifact</option>
                  <option value="creature">Creature</option>
                  <option value="enchantment">Enchantment</option>
                  <option value="instant">Instant</option>
                  <option value="land">Land</option>
                  <option value="planeswalker">Planeswalker</option>
                  <option value="sorcery">Sorcery</option>
                  
                </select>
              </div>
            </div>
            <div class="col" v-show="catalog.length > 0">
              <div class="input-group mb-2">               
                <select class="form-control" v-model="selected_catalog" options="catalog">
                  <option value="">Select from Catalog</option>                    
                </select>
              </div>
            </div>
            <div class="col" v-show="selected_card_type != 'artifact' && selected_card_type != 'land' && selected_card_type != ''">
              <div class="input-group mb-2">               
                <select class="form-control" v-model="selected_color" v-on="change:resetSelectedColor()" multiple>
                  <option disabled>Select a Color</option>
                  <option value="b">Black</option>
                  <option value="u">Blue</option>
                  <option value="g">Green</option>
                  <option value="r">Red</option>
                  <option value="w">White</option>                
                </select>                
              </div><small class="form-text text-muted">Multiple Select (Ctrl + Click)</small>
            </div>            
          </div><hr>
          <div class="row">
            <div class="container"><h6 class="kufam modal-title">Oracle Contains:</h6></div>           
            <div class="col">
              <div class="input-group mb-2">               
                <select class="form-control" v-model="selected_oracle_type">
                  <option value="">Select Oracle Catalog</option>
                  <option value="keyword-abilities">Abilities</option>
                  <option value="keyword-actions">Actions</option>
                  <option value="ability-words">Words</option>                 
                </select>
              </div>
            </div>
            <div class="col">
              <ul class="list-group shadow scroller-oracle">
                <li class="list-group-item"
                    v-repeat="oracle in oracle_catalog">
                    @{{ oracle }} &nbsp;&nbsp;&nbsp; 
                    <span class="badge badge-pill badge-primary pointer float-right" 
                          v-on="click:addOracle( oracle )">
                      Add
                    </span>
                  </li>              
              </ul>
            </div>
            <div class="col">
              <ul class="list-group shadow scroller-oracle">
                <li class="list-group-item"
                  v-repeat="oracle in oracle_selected">
                  @{{ oracle }}
                  <span class="badge badge-pill badge-danger pointer float-right"
                        v-on="click:removeOracle($index)">                     
                    Remove
                  </span>
              </li> 
              </ul>
            </div>
          </div><br>
          <div class="row">
            <div class="container"><h6 class="kufam modal-title">Rarity:</h6></div>
            <div class="col-4">
              <div class="input-group mb-2">               
                <select class="form-control" v-model="selected_rarity">
                  <option value="">Select Rarity</option>
                  <option value="common">Common</option>
                  <option value="uncommon">Uncommon</option>
                  <option value="rare">Rare</option>  
                  <option value="mythic">Mythic</option>               
                </select>
              </div>
            </div>
            <div class="col-4"><div class="container"><h6 class="kufam modal-title">Mana Cost:</h6></div>
              <ul class="list-group shadow scroller-oracle">
                <li class="list-group-item">                  
                  <div class="input-group mb-2">               
                    <select class="form-control form-control-sm" v-model="selected_mana">
                      <option value="">Select Colorless Mana</option>
                      <option value="x">X</option>
                      @for ($i = 0; $i <= 20; $i++)
                      <option value="{{$i}}">{{ $i }}</option>
                      @endfor                   
                    </select>
                  </div>                 
                </li>              
                <li class="list-group-item" v-repeat="icon in selected_color">
                  <img src="/img/icon/@{{icon}}.svg.png" height="9%" width="9%">
                  <span class="badge badge-pill badge-primary pointer float-right" 
                         v-on="click:addMana(icon)">
                         Add
                  </span>
                </li>                              
              </ul>
            </div>
            <div class="col-4">
              <div class="container shadow">
                <ul class="list-inline" v-show="selected_mana != ''">
                  <li class="list-inline-item">
                    <img src="/img/icon/@{{selected_mana}}.svg" height="8%" width="8%">                             
                  </li>
                </ul>
                <ul class="list-inline" v-show="mana_cost.length > 0 ">  
                  <li class="list-inline-item" v-repeat="mana in mana_cost">
                    <img src="/img/icon/@{{mana}}.svg.png" height="9%" width="9%">
                    <span class="badge badge-pill badge-danger pointer float-right"
                          v-on="click:removeManaCost($index)">                     
                      Remove
                    </span>
                  </li>               
                </ul>
              </div>
             
            </div>
          </div><br>
          <div class="row">
            <div class="col-6"><div class="container"><h6 class="kufam modal-title">Oracle Text:</h6></div>
              <input class="form-control bg-white rounded" type="text" placeholder="Keywords in oracle" v-model="word">
            </div>
          </div>
         
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-dark" v-on="click:applySearch()" >Apply Search!</button>
          <button type="button" class="btn btn-info" v-on="click:resetSearch()" >Reset</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>