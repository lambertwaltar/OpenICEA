<form id="msform" method="post">
 	 {{ csrf_field() }}
    <input type="text" name="permissionname" placeholder="Permission name" autofocus/>
    <p style="text-align:left; font-size: 0.7em;color:#949494; clear: both;">Separate multiple permissions using a comma (,)</p>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="submit" class="btn btn-primary" id="savepermission" style="float:left;">Save Permission</button>
  	</div>
</form>