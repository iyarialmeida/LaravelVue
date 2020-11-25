<div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advanced Search </h5> &nbsp;&nbsp; <img src="{{ asset('img/icon/eye.gif') }}" height="30px;" width="30px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="search-div">
          <div class="row">
            <div class="col">             
              <div class="input-group mb-2">               
                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="Card Name"  v-model="query3 | lowercase">
              </div>
            </div>
            <div class="col" v-show="query3.length > 0">Do you Mean...            
              <select v-model="selected" options="query_result">
                <option value="">maybe...</option>
              </select> &nbsp;&nbsp;
              <span> <a href="#" class="btn btn-light active d-inline" v-on="click:searchByString(selected)"> Yes! </a></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>