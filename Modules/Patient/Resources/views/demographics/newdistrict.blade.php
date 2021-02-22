<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="districtname" placeholder="District Name" autofocus/>
  <select class="form-control" name="country">
    <option value="">Select Country</option>
    @foreach ($countries as $country)
    <option value="{{ $country->OID }}">{{ $country->Name }}</option>
    @endforeach
  </select>
  <span class="error" style="display:none;"></span>  
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savedistrict" style="float:left;"  />
  </div>
</form>