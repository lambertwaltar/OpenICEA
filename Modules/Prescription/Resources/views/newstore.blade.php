<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>  
	<input type="text" name="storename" placeholder="Store Name" autofocus/>
    <div style="text-align: left;">
        <label for="ismain" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Main?</label>
        <input type="checkbox" id="ismain" name="ismain" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>
    <div style="text-align: left;">
        <label for="isactive" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Active?</label>
        <input type="checkbox" id="isactive" name="isactive" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="storesave" class="action-button" value="Save" id="savestore" />
    </div>
</form>