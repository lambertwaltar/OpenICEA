<form id="msform" method="post">
  {{ csrf_field() }}
  <input type="text" name="appointmenttypename" placeholder="Appointment Type" autofocus/>
  <span class="error" style="display:none;"></span> 
    
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="submit" class="phonesubmit action-button" value="Save" id="saveappointmenttype" style="float:left;" />
  </div>
</form>