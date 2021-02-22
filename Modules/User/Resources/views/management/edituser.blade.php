
<style>
	select:required:invalid {
    	color: #666;
    }
    select{
    	margin-bottom: 10px;
    }
	option[value=""][disabled] {
		display: none;
	}
	option {
		color: #000;
	}
</style>

<form id="msform" action="{{url('/updateuser')}}" method="post">
	{{ csrf_field() }}
	<h2 class="fs-title">ACCOUNT CREDENTIALS</h2>
	<input type="hidden" name="oid" placeholder="Username" value="{{ Crypt::encrypt($user->OID)}}" readonly />
	<input type="text" name="username" placeholder="Username" value="{{ $user->username}}" readonly />
	<input type="password" name="password" placeholder="Password" id="password" value=""autocomplete="new-password" />
	<input type="password" name="password_confirmation" placeholder="Confirm Password"/>
	<h2 class="fs-title">ASSIGN ROLE</h2>
	<select id="ms" multiple="multiple" class="form-control" name="roles[]">
	    @foreach ($roles as $role)
	        <option value="{{ $role->id }}">{{ $role->name }}</option>
	    @endforeach
	</select>
	<h2 class="fs-title">Personal Details</h2>
	<h3 class="fs-subtitle"></h3>
	<input type="text" name="firstname" placeholder="First Name" value="{{ $user->FirstName}}" />
	@if ($errors->has('firstname'))
	      <span class="error">{{ $errors->first('firstname') }}</span>
	@endif 
	<input type="text" name="lastname" placeholder="Last Name" value="{{ $user->LastName}}" />
	@if ($errors->has('lastname'))
	      <span class="error">{{ $errors->first('lastname') }}</span>
	@endif 
	<input type="text" name="email" placeholder="Email Address" value="{{ $user->EmailAddress}}" />
	@if ($errors->has('email'))
	      <span class="error">{{ $errors->first('email') }}</span>
	@endif

	<div style="text-align: left;">
        <label for="isclinician" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Clinician?</label>
        <input type="checkbox" value='1' id="isclinician" name="isclinician" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

    <div class="modal-footer">
	   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	<input type="submit" name="submit" class="action-button" value="Update User" id="updateuser" style="float:left;"/>
	</div>
</form>
<script>
    // Initialize multiple select on your regular select
   $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({ width: '100%'});
    });

   $(document).ready(function(){
   		$('button span.placeholder').text('Assign Roles');

   });

</script>



