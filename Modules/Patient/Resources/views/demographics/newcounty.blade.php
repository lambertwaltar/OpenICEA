<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="countyname" placeholder="County Name" autofocus />
  <select class="form-control" name="district">
    <option value="">Select District</option>
    @foreach ($districts as $district)
    <option value="{{ $district->OID }}">{{ $district->Name }}</option>
    @endforeach
  </select>
  <span class="error" style="display:none;"></span>  
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savecounty" style="float:left;"  />
  </div>
</form>