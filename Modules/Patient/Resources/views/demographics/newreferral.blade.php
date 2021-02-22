@extends('patient::layouts.master')
  

@section('title') OpenICEA | Admin @endsection

@section('heading')
<!--<img src="images/edituser.png" style="width:4%;"> --><font class="page-heading">NEW REFERRAL</font>
@endsection
@section('links')

<style>
  select:required:invalid {
      color: #666;
      }
      option[value=""][disabled] {
      display: none;
      }
      option {
      color: #000;
      }
</style>

@endsection

@section('content')

  <form id="msform" action="{{route('newreferral')}}" method="post">
      {{ csrf_field() }}
      <fieldset>
          <legend  class="w-auto" style="color:#07abf8; margin:0 1%;font-size:0.8em; background:#ffffff; border-radius:3px; ">NEW REFERRAL</legend>
          <h2 class="fs-title"></h2>
        <!--  <h3 class="fs-subtitle">Access details</h3> -->
          <input type="text" name="referralname" placeholder="Referral Name" />
          @if ($errors->has('referralname'))
                <span class="error">{{ $errors->first('referralname') }}</span>
          @endif  

          <input type="submit" name="submit" class="submit action-button" value="Save" style="float:left;width: auto;"/>
           <div class="text-center" style="margin:2vh; padding-top:1vh;">
              <a class="small" href="{{route('client-home')}}" style="margin-top:1vh">Cancel</a>
          </div>
      </fieldset>
    </form>
            
@endsection

@section('footer-links')
<script type="text/javascript" src="{{url('js/registration.js')}}"></script>
<script type="text/javascript" src="{{url('js/multiple-select.js')}}"></script>

<script>
    // Initialize multiple select on your regular select
   $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>

@endsection
