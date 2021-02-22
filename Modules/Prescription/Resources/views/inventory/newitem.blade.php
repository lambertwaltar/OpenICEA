<form id="msform">
    {{ csrf_field() }}
  	<span class="error" style="display:none;" id="encounterformerror"></span>  
    <input type="text" name="barcode" id="barcode" placeholder="Barcode" required />
    <input type="text" name="displayname" id="displayname" placeholder="Display Name" readonly required />
    <div style="text-align: left;">
        <label for="isdrug" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Drug?</label>
        <input type="checkbox" id="isdrug" name="isdrug" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>
    <select class="form-control" name="drug" id="drug" style="display:none">
        <option value="">Drug</option>
        @foreach($drugs as $drug)
            <option value="{{$drug->OID}}">{{$drug->DrugName}}</option>
        @endforeach
    </select>
    <input type="text" name="itemdescription" id="itemdescription" placeholder="Item Description"  required />

    <select class="form-control" name="fundingsource" id="fundingsource" required>
        <option value="">Funding Source</option>
        @foreach($fundingsources as $fundingsource)
            <option value="{{$fundingsource->OID}}">{{$fundingsource->Name}}</option>
        @endforeach
    </select>

    <select class="form-control" name="productgroup" id="productgroup" required>
        <option value="">Product Group</option>
        @foreach($productgroups as $productgroup)
            <option value="{{$productgroup->OID}}">{{$productgroup->Name}}</option>
        @endforeach
    </select>

    <select class="form-control" name="measureunit" id="measureunit" required>
        <option value="">Unit of Measure</option>
        @foreach($measureunits as $measureunit)
            <option value="{{$measureunit->OID}}">{{$measureunit->Name}}</option>
        @endforeach
    </select>

    <input type="number" step="0.01" min="0" name="quantityperunit" id="quantityperunit" placeholder="Quantity Per Unit"/>

    <select class="form-control" name="unitdescription" id="unitdescription" required>
        <option value="">Unit Description</option>
        @foreach($unitdescriptions as $unitdescription)
            <option value="{{$unitdescription->OID}}">{{$unitdescription->Name}}</option>
        @endforeach
    </select>

    <select class="form-control" name="condition" id="condition" required>
        <option value="">Storage Conditions</option>
        @foreach($conditions as $condition)
            <option value="{{$condition->OID}}">{{$condition->Name}}</option>
        @endforeach
    </select>

    <select class="form-control" name="location" id="location" required>
        <option value="">Location</option>
        @foreach($locations as $location)
            <option value="{{$location->OID}}">{{$location->Name}}</option>
        @endforeach
    </select>

     <div style="text-align: left;">
        <label for="isative" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Active?</label>
        <input type="checkbox" id="isative" name="isative" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savedrug" class="action-button" value="Save" id="saveitem" />
    </div>
</form>

<script type="text/javascript">
    
    $('#isdrug').change(function() {
        if ($(this).prop('checked')) {
           $('#drug').css('display','block'); 
        }
        else {
            $('#drug').css('display','none'); 
        }
    });

    //save Item
        $('.modal-body').on('click', '#saveitem', function() {
            var form = new FormData(document.getElementById('msform'));
            $.ajax({
                type: 'post',
                url: '{{route("createstockitem")}}',
                data: form,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.error){
                            $(".error").css("display", "block");
                            $('.error').text(data.error);
                            return;
                        }
                    $('.modal').each(function(){
                        $(this).modal('hide');
                        $(".error").css("display", "none");
                        $('.error').text("");
                        window.location = "{{ route('stock') }}";
                    });


                },
                error: function(){
                    console.log('Error');
                },
            });
        });

</script>