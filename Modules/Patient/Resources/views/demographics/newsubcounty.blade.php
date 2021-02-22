<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="subcountyname" placeholder="Subcounty Name" autofocus/>
  <select class="form-control" name="county">
    <option value="">Select County</option>
    @foreach ($counties as $county)
    <option value="{{ $county->OID }}">{{ $county->Name }}</option>
    @endforeach
  </select>
  <span class="error" style="display:none;"></span>  
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savesubcounty" style="float:left;"  />
  </div>
</form>