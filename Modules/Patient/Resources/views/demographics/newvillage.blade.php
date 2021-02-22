<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="villagename" placeholder="Village Name" autofocus/> 
  <select class="form-control" name="parish">
    <option value="">Select Parish</option>
    @foreach ($parishes as $parish)
    <option value="{{ $parish->OID }}">{{ $parish->Name }}</option>
    @endforeach
  </select>
  <span class="error" style="display:none;"></span>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savevillage" style="float:left;" />
  </div>
</form>