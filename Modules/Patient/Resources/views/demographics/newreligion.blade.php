<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="religionname" placeholder="Religion Name" autofocus/>
  <span class="error" style="display:none;"></span> 
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savereligion" style="float:left;"  />
  </div>
</form>