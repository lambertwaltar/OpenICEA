<form id="msform">
    {{ csrf_field() }}
    <span class="error" style="display:none;"></span>
    <input type="text" name="code" placeholder="Code" autofocus/>
	<input type="text" name="fundingsourcename" placeholder="Funding Source"/>
    <div style="text-align: left;">
        <label for="specifiable" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Specifiable?</label>
        <input type="checkbox" id="specifiable" name="specifiable" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savefundingsource" class="action-button" value="Save" id="savefundingsource" />
    </div>
</form>