<style type="text/css">
	#settingstable label{
		margin-bottom: 0 !important;
	}
	#settingstable td{
		/* padding: 0 !important; */
	}

</style>
<div class="limiter">
	<div class="container-table100">
		<div class="wrap-table100">
			<div class="table100 ver1 m-b-110" style="padding-top:0 !important">
				<div class="table100-body js-pscroll">
					<table id="settingstable">
						<tbody>
							<tr class="row100 head" style="height:30px; text-align: center;font-size:0.9em; line-height: 1.5 !important;font-family: montserrat; ">
								<th class="cell100 column3" >Setting</th>
								<th class="cell100 column5" >Description</th>
								<th class="cell100 column3" >Status</th>
								<th class="cell100 column3" ></th>
							</tr>
							@foreach($settings as $setting)
							<tr class="row100 body clickable-row" style="color:#000000; text-align: center;font-size:0.9em; line-height: 1.5 !important;font-family: montserrat;">
								<td class="cell100 column3"><input type="hidden" name="settingid" value="{{$setting->OID}}">{{$setting->Name}}</td>
								<td class="cell100 column5">{{$setting->Description}}</td>
								<td class="cell100 column3" id="status">{{$setting->Status}}</td>
								<td class="cell100 column3" id="settingaction">
									@if($setting->Status =="Disabled")
										<label class="action" id="Enabled" style="cursor: pointer; color:#1b89b5;">Enable</label>
							        @else
							        	<label class="action" id="Disabled" style="cursor: pointer; color:#1b89b5;">Disable</label>
							        @endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<span class="error" style="display:none;"></span>
</form>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 4px 10px;border-radius: 3px;">Close</button>
</div>


<script type="text/javascript">
	$(document).on('click','.action',function(e){
		//e.preventDefault();
		e.stopImmediatePropagation();
		var href = $(this).attr('href');
		var status = $(this).attr('id');
		var id = $('input[name=settingid]').val();

		 $.ajax({
            type: 'get',
            url: '{{route("rasetting")}}',
            data:{'status':status,'id':id},
            success: function(data)
            {  
            	for(var i=0;i<data.length;i++){
            		$('input[name=settingid]').val(data[i].OID);
            		$('#status').text(data[i].Status);
            		if(data[i].Status==="Disabled"){
            			$('#settingaction').html('').append('<label class="action" id="Enabled" style="cursor: pointer; color:#1b89b5;">Enable</label>')
            		}
            		else{
            			$('#settingaction').html('').append('<label class="action" id="Disabled" style="cursor: pointer; color:#1b89b5;">Disable</label>');
            		}
            		

            	}                            
               
            }

        });


	});
</script>