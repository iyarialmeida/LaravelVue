<div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5> &nbsp;&nbsp; <img src="{{ asset('img/icon/eye.gif') }}" height="30px;" width="30px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">             
              <div class="input-group mb-2" id="search-div">
                <div class="input-group-prepend  pointer link-light">
                  <div class="input-group-text" v-on="click:goSearch()">Go!</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Card Name"  v-model="query3 | lowercase">
              </div>
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