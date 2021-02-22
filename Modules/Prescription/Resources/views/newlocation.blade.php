<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>   
    <input type="text" name="locationname" placeholder="Location" autofocus/>
    <select class="form-control" name="store">
    <option value="">Select Store</option>
      @foreach ($stores as $store)
        <option value="{{ $store->OID }}">{{ $store->Name }}</option>
      @endforeach
  </select>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savelocation" class="action-button" value="Save" id="savelocation" />
    </div>
</form>