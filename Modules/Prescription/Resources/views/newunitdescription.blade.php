<form id="msform">
    {{ csrf_field() }}
	<input type="text" name="unitdescriptionname" placeholder="Unit Description" autofocus/>
    <input type="text" name="shortname" placeholder="Short Name"/>
    <span class="error" style="display:none;"></span>  
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="saveunitdescription" class="action-button" value="Save" id="saveunitdescription" />
    </div>
</form>