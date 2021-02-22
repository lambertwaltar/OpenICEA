<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="parishname" placeholder="Parish Name" autofocus/>
  <select class="form-control" name="subcounty">
    <option value="">Select Subcounty</option>
    @foreach ($subcounties as $subcounty)
    <option value="{{ $subcounty->OID }}">{{ $subcounty->Name }}</option>
    @endforeach
  </select>
  <span class="error" style="display:none;"></span>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="saveparish" style="float:left;"  />
  </div>
</form>