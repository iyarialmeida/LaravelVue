<div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" id="search-div">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advanced Search </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">             
              <div class="input-group mb-2">               
                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="Card Name"  v-model="query3 | lowercase">
              </div>
            </div>
            <div class="col" v-show="query3.length > 0 && query_result.length > 0">Do you Mean...            
              <select v-model="selected" options="query_result">
                <option value="">maybe...</option>
              </select> &nbsp;&nbsp;
              <span> <a href="#" class="btn btn-light active d-inline" v-on="click:searchByString(selected)"> Yes! </a></span>
            </div>
          </div><hr>
          <div class="row">
            <div class="col">
              <div class="input-group mb-2">               
                <select class="form-control form-control-sm" v-model="selected_card_type">
                  <option value="">Select a Card Type</option>
                  <option value="artifact">Artifact</option>
                  <option value="creature">Creature</option>
                  <option value="enchantment">Enchantment</option>
                  <option value="land">Land</option>
                  <option value="planeswalker">Planeswalker</option>
                  <option value="spell">Spell</option>
                </select>
              </div>
            </div>
            <div class="col" v-show="catalog.length > 0">
              <div class="input-group mb-2">               
                <select class="form-control form-control-sm" v-model="selected_catalog" options="catalog">
                  <option value="">Select from Catalog</option>                    
                </select>
              </div>
            </div>
            <div class="col" v-show="selected_card_type != 'artifact' && selected_card_type != 'land' && selected_card_type != '' && selected_card_type != 'planeswalker'">
              <div class="input-group mb-2">               
                <select class="form-control form-control-sm" v-model="selected_color">
                  <option value="">Select a Color</option>
                  <option value="black">Black</option>
                  <option value="blue">Blue</option>
                  <option value="green">Green</option>
                  <option value="red">Red</option>
                  <option value="white">White</option>
                </select>
              </div>
            </div>
            
          </div>
         
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-dark" v-on="click:applySearch()" >Apply Search!</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>