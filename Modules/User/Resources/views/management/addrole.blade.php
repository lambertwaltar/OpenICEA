<form id="msform" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id">
    <input type="text" name="rolename" placeholder="Role name" autofocus/>
    <h2 class="fs-title">ASSIGN PERMISSIONS</h2>
    <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="myselect">
        @foreach($permissions as $permission)
            <option value={{$permission->id}}>{{$permission->name}}</option>
        @endforeach
    </select>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="submit" class=" submit btn btn-primary" id="saverole" style="float:left;">Save Role</button>
    </div>
</form>
<script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    $('#bootstrap-duallistbox-nonselected-list_duallistbox_demo1[]').css('min-height','200px !important');
</script>



