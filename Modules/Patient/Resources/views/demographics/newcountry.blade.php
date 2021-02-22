<form id="msform" method="post">
	{{ csrf_field() }}
	<input type="text" name="countryname" placeholder="Country Name" autofocus/>
	<span class="error" style="display:none;"></span> 
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="button" name="submit" class="phonesubmit action-button" value="Save" id="savecountry" style="float:left;" />
	</div>
</form>
