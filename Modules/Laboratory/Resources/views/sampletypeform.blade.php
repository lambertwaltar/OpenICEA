<form id="msform">
    {{ csrf_field() }}
    <table class="prescription_table">
        <tr>
            <td>Name:</td><td>  <input type="text" name="name" autofocus/></td>
        </tr>
    </table>
    <span class="error" style="display:none;"></span>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savesampletype" class="action-button" value="Save" id="savesampletype" />
    </div>
</form>