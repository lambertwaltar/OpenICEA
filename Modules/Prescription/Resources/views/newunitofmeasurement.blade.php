<form id="msform">
    {{ csrf_field() }}
    <input type="text" name="unitofmeasurement" placeholder="Unit of Measurement" autofocus/>
    <input type="text" name="shortname" placeholder="Short Name"/>
    <div style="text-align: left;">
        <label for="specifiable" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Decomposable?</label>
        <input type="checkbox" id="decomposable" name="decomposable" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>
    <span class="error" style="display:none; clear:both;"></span>  
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="saveunitofmeasurement" class="action-button" value="Save" id="saveunitofmeasurement" />
    </div>
</form>