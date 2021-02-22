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
@toastr_css
<script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
<link rel='icon' href="{{url('favicon.ico')}}" type='image/x-icon'/>

</head>
<body>

<div class="container-fluid">

 <header align="center" style="width: 100%;">
  <div style="width: 100%">
     <h3 style="font-weight: 700;">ADULT INFECTIOUS DISEASES CLINIC SIDE LAB</h3>
  </div>
  <div style="display: inline-flex;">
        <div>
          <img style="width: 70px; height: 70px;" src="../images/idi.png" alt="barcode">
          <p>IDC 034</p>
        </div>
        <div style="margin: auto 100px;">
           <H4 style="font-weight: 700;"><em>Infectious Diseases Institute</em></H4>
           <h6 style="font-weight: 600;">College Of Health Sciences, Makerere University</h6>
           <h6 style="font-weight: 600;">GENERAL REQUISITION/RESULTS</h6>
        </div>
        <div>
          <img style="width: 70px; height: 70px;" src="../images/idi.png" alt="idi">
        </div>
  </div>
 </header>

 <div class="card" style="margin: 2rem; border : 0px">
   <div class="card" style="border: 0px solid">
    <p style="margin-left: 4rem;">Margaret, NM. Nalubwama</p>
     <hr style="border-top: dotted 1px #000">
   </div>
   <div class="card" style="border: 0px solid">
    <table>
      <tr>
        <td  style="vertical-align: top; width: 8rem;">
          Sample type:
        </td>
        <td>
          <div>
            <p><input type="checkbox" name="1" value=""><label style="margin-left: 1rem">Purple top tube {P} EDTA</label></p>
            <p><input type="checkbox" name="2" value=""><label style="margin-left: 1rem">Red top tube {R}</label></p>
            <p><input type="checkbox" name="3" value=""><label style="margin-left: 1rem">Urine</label></p>
            <p><input type="checkbox" name="4" value=""><label style="margin-left: 1rem">Sputum</label></p>
            <p><input type="checkbox" name="5" value=""><label style="margin-left: 1rem">Other</label></p>
          </div>
        </td>
      </tr>
    </table>
     <hr style="border-top: dotted 1px #000;">
   </div>
   <div class="card" style="border: 0px solid">
    
          <table>
            <tr>
              <td>Ordered By: </td><td>Kulume Ruth (Nurse)</td><td>Date: </td><td>19-Apr-2020</td><td>Time: </td><td> 09:45:12</td>
            </tr>
            <tr>
              <td>Colleted By: </td><td>Kulume Ruth (Nurse)</td><td>Date: </td><td>19-Apr-2020</td><td>Time: </td><td> 09:45:12</td>
            </tr>
            <tr>
              <td>Tested By: </td><td>Kulume Ruth (Nurse)</td><td>Date: </td><td>19-Apr-2020</td><td>Time: </td><td> 09:45:12</td>
            </tr>
          </table> 
     <hr style="border-top: dotted 1px #000;">

     <table>
      <tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="1" value=""><label style="margin-left: 1rem">hemoglobin: </label> </p>
        </td>
        <td><p>12</p>
        </td>
        </tr>
        <tr></tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="2" value=""><label style="margin-left: 1rem">Peripheral Smear: </label></p>
        </td>
        <td>
        </td>
        </tr>
        <tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="3" value=""><label style="margin-left: 1rem">Syphilis: </label> </p>
        </td>
        <td>
        </td>
        </tr>
        <tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="4" value=""><label style="margin-left: 1rem">RPR </label> </p>
        </td>
        <td>
        </td>
        </tr>
        <tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="5" value=""><label style="margin-left: 1rem">Blood Glucose</label> </p>
        </td>
        <td>
        </td>
        </tr>
        <tr>
        <td  style=" width: 15rem;">
          <p><input type="checkbox" name="5" value=""><label style="margin-left: 1rem">Blood Smear, Parasites</label> </p>
        </td>
        <td>
        </td>
        </tr>
    </table>
     <hr style="border-top: dotted 1px #000;">
    <table>
      <thead>
        <tr>
          <th>Urine Dipstick</th>
          <th>Urine Microscopic</th>
          <th>Stool, Directexam</th>
        </tr>
      </thead>
      <tr>
        <td style="vertical-align: top;">
          <table>
            <tr>
              <td>Color: </td><td>red</td>
              </tr>
            <tr>
              <td>Clarity: </td><td>red</td>
              </tr>
            <tr>
              <td>Sp.Gr: </td><td>red</td>
              </tr>
            <tr>
              <td>pH: </td><td>red</td>
              </tr>
            <tr>
              <td>Nitrites: </td><td>red</td>
              </tr>
            <tr>
              <td>Proteins: </td><td>red</td>
              </tr>
            <tr>
              <td>Glucose: </td><td>red</td>
              </tr>
            <tr>
              <td>Ketones: </td><td>red</td>
              </tr>
            <tr>
              <td>Urobil: </td><td>red</td>
              </tr>
            <tr>
              <td>Bilirubin: </td><td>red</td>
              </tr>
            <tr>
              <td>Blood: </td><td>red</td>
              </tr>
            <tr>
              <td>Leukocytes: </td><td>red</td>
            </tr>
          </table>
          
        </td>
        <td style="vertical-align: top">
          <table>
            <tr>
              <td>WBCs: </td><td>#</td>
              </tr>
            <tr>
              <td>Lyphocytes: </td><td>#</td>
              </tr>
          </table>
        </td>
        <td style="vertical-align: top">
          <table>
            <tr>
              <td>Form: </td><td>##</td>
              </tr>
            <tr>
              <td>formz: </td><td>#@</td>
              </tr>
            </table>
        </td>
      </tr>
    </table>
    <hr style="border-top: dotted 1px #000;">
   </div>
       <div class="footer" style="margin-right: 5px;position:fixed; bottom:0;">
        <div style="font-size: 10px; text-align: right;">Powered by OpenICEA</div>
      </div>
</div>
</div>


</body>
</html>