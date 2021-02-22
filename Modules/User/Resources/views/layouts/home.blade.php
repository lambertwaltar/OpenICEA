<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
 
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/registration.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}"/>
@toastr_css
<script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
<link rel='icon' href="{{url('favicon.png')}}" type='image/x-icon'/>

@yield('styles')

</head>
<body>

<div class="container-fluid">
  <div class="row no-gutter">
    <!-- <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>-->
    <div class="col-md-8 col-lg-12">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4"></h3>
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{url('js/registration.js')}}"></script>
<script>
$(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
})
</script>

</body>
@toastr_js
@toastr_render
</html>