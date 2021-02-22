  @extends('user::layouts.home')
 
@section("title")
  OpenICEA | Register
@endsection


@section('content')
	<style>
		.login, .image {
			min-height: 100vh;
			padding: 0 !important;
		}
	</style>
	
	<style>
		.login-form {
			width: 500px;
			margin: 30px auto;
		}
		.login-form form {        
			margin-bottom: 15px;
			background: #f7f7f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.login-form h2 {
			margin: 0 0 15px;
		}
		.form-control, .login-btn {
			border-radius: 2px;
		}
		.input-group-prepend .fa {
			font-size: 18px;
		}
		.login-btn {
			font-size: 15px;
			font-weight: bold;
			min-height: 40px;
		}
		.social-btn .btn {
			border: none;
			margin: 10px 3px 0;
			opacity: 1;
		}
		.social-btn .btn:hover {
			opacity: 0.9;
		}
		.social-btn .btn-secondary, .social-btn .btn-secondary:active {
			background: #507cc0 !important;
		}
		.social-btn .btn-info, .social-btn .btn-info:active {
			background: #64ccf1 !important;
		}
		.social-btn .btn-danger, .social-btn .btn-danger:active {
			background: #df4930 !important;
		}
		.or-seperator {
			margin-top: 20px;
			text-align: center;
			border-top: 1px solid #ccc;
		}
		.or-seperator i {
			padding: 0 10px;
			background: #f7f7f7;
			position: relative;
			top: -11px;
			z-index: 1;
		}
		.form-control{
			font-size:0.8rem;
		}
	</style>
<div class="login-form">
    <form id="msform" action="{{url('/post-registration')}}" method="post" class="card" style="width:550px;padding-top:5px;background-color: #f7f7f7 !important; padding:10px 5px; margin:10px auto !important;">
		<div style="display:flex; margin:20px auto; width:80%; border-bottom:solid 1px #cccccc; padding-bottom: 10px;">
			<img src="images/IDILogo.png" style="width:20%;margin-right: 20px;"><img src="images/openicea1.png" style="width:60%;margin:auto;">
		</div>
		{{ csrf_field() }}
        <h2 class="fs-title">ACCOUNT CREDENTIALS</h2>
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="username" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Username</label>
				<input class="form-control" type="text" name="username" id="username" value="{{ old('username') }}"  required/>
				@if ($errors->has('username'))
					<span class="error">{{ $errors->first('username') }}</span>
				@endif 
            </div>
        </div>
        
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="password" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Password</label>
				<input class="form-control" type="password" name="password" id="password" required/>
				@if ($errors->has('password'))
					<span class="error">{{ $errors->first('password') }}</span>
				@endif 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="password_confirmation" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Confirm Password</label>
				<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required/>
				@if ($errors->has('password_confirmation'))
					<span class="error">{{ $errors->first('password_confirmation') }}</span>
				@endif 
            </div>
        </div>
		
        <h2 class="fs-title">Personal Details</h2>
        <div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="firstname" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">First name</label>
				<input class="form-control" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required/>
				@if ($errors->has('firstname'))
					<span class="error">{{ $errors->first('firstname') }}</span>
				@endif 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="lastname" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Last name</label>
				<input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required/>
				@if ($errors->has('lastname'))
					<span class="error">{{ $errors->first('lastname') }}</span>
				@endif 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="email" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Last name</label>
				<input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required/>
				@if ($errors->has('email'))
					<span class="error">{{ $errors->first('email') }}</span>
				@endif 
            </div>
        </div>
		<div style="width:30%; margin-left:65px;">
			<input type="submit" name="submit" class="btn btn-primary login-btn btn-block" value="REGISTER" style="float:left;color:#ffffff;padding:0 !important"/>
        </div>
    </form>
	<p class="text-center text-muted small">Have an account? <a href="{{url('/')}}">Login Here!</a></p>
</div>           
@endsection