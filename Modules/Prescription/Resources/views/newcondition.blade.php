<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>  
	<input type="text" name="conditionname" placeholder="Condition" autofocus/>
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savecondition" class="action-button" value="Save" id="savecondition" />
    </div>
</form>