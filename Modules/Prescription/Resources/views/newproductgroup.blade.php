<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>  
	<input type="text" name="productgroupname" placeholder="Product Group" autofocus/>
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="saveproductgroup" class="action-button" value="Save" id="saveproductgroup" />
    </div>
</form>