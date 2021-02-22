<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>
    <input type="text" name="code" placeholder="Code" autofocus/>
	<input type="number" name="frequency" placeholder="Frequency" style="appearance:textfield" />
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="saveschedule" class="action-button" value="Save" id="saveschedule" />
    </div>
</form>