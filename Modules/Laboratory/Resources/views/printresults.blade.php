<!DOCTYPE html>
<html>
<head>
	@foreach($results as $result)
		@php
			$patient = $result->grpatient->FirstName." ".$result->grpatient->Surname;
            $encounter = $result->grencounter->visitDate;
            $pdfname = $patient.' [Encounter-'.$encounter.']';
		@endphp
		<title>{{$pdfname}}</title>
	@endforeach
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		@font-face {
		  	font-family: 'elite';
		  	src: url('font/SpecialElite-Regular.ttf') format('truetype');
		}
		@font-face {
		  	font-family: 'bold';
		  	src: url('font/typewcond_bold.otf') format('opentype');
		}
		body{
			font-size: 12px !important;
			font-family: elite !important;
		}
		input[type=checkbox] : before { font-family: DejaVu Sans; }
		td,th{
			padding: 2px 0px;
			text-align: left;
			/* font-weight: 300; */
		}
	</style>
</head>
<body style="padding:30px 40px;">
	@php
	    $sensresis = array("1"=>"Sensitive", "2"=>"Resistant");
	    $posneg = array("1"=>"Positive", "2"=>"Negative");
	    $posnegpen = array("1"=>"Positive", "2"=>"Negative","3"=>"Pending");
	    $prpresult = array("1"=>"Reactive", "2"=>"Non-Reactive");
	    $quantity = array("1"=>"+", "2"=>"+ +","3"=>"+ + +", "4"=>"+ + + +");
	    $parasitespecies = array("1"=>"Falciparum", "2"=>"Malariae","3"=>"Ovale", "4"=>"Vivax");
	    $urinecolor = array("1"=>"Yellow", "2"=>"Amber","3"=>"Blood Stained");
	    $urineclarity = array("1"=>"Clear", "2"=>"Turbid");
	    $urinegrav = array("1"=>"1.000", "2"=>"1.005","3"=>"1.010", "4"=>"1.015","5"=>"1.020", "6"=>"1.025","7"=>"1.030");
	    $urineleuko = array("1"=>"Negative", "2"=>"+","3"=>"+ +", "4"=>"+ + +");
	    $urineprotein = array("1"=>"Negative", "2"=>"30","3"=>"100", "4"=>"500");
	    $urineglucose = array("1"=>"Normal", "2"=>"30","3"=>"100", "4"=>"300","5"=>"500");
	    $urineurobil = array("1"=>"Normal", "2"=>"+","3"=>"+ +", "4"=>"+ + +");
	    $urineblood = array("1"=>"Negative", "2"=>"+","3"=>"+ +", "4"=>"+ + +","5"=>"+ + + +");
	    $stool = array("1"=>"Semi Formed", "2"=>"Formed","3"=>"Diarrhoeic", "4"=>"Loose");
	    $yesno = array("1"=>"Yes", "2"=>"No");
	    $stainsource = array("1"=>"Urine", "2"=>"Stool","3"=>"Aspirate", "4"=>"Pleural Fluid");

	@endphp
	<!-- <div style="text-align: center; font-size:24px !important;">ADULT INFECTIOUS DISEASES CLINIC SIDE LAB</div> -->
	@foreach($results as $result)
		<table style="width:100%;">
			<tr>
				<td><img src="images/barcode.png" style="width:60px"></td>
				<td style="text-align:center;">
					<!-- <div style="text-align: center; font-size:18px !important;">ADULT INFECTIOUS DISEASES CLINIC SIDE LAB</div>
					<div style="font-size:20px !important"><em>Infectious Diseases Institute</em></div>
		           	<div style="font-size:12px !important">College Of Health Sciences, Makerere University</div> -->
		           	<div style="text-align: center; font-size:18px !important;">OpenICEA</div>
		           	<div style="font-size:16px !important;">GENERAL REQUISITION/RESULTS</div>
				</td>
				<td><img src="images/laboratory.png" style="width:60px"></td>
			</tr>
			<tr>
				<td>Client No: {{$result->grpatient->IDCNO }}</td>
				<td>{{$result->grpatient->FirstName." ".$result->grpatient->Surname }}</td>
			</tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table>
			<tr>
				<td  rowspan="8" style="padding:0 10px;vertical-align: middle;background: #d6d6d6">Sample Type</td>
			</tr>
			@if($result->PurpleTopTube == '1')
	            <tr>
	            	<td class="checkbox">
	                    <input type="checkbox" name="purpletoptube" checked id="{{$result->PurpleTopTube}}" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Purple top tube [P], EDTA:</td>
	            </tr>
	        @endif
			@if($result->RedTopTube == '1')
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="redtoptube"  checked id="{{$result->RedTopTube}}" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Red top tube [R]: </td>
	            </tr>
	        @endif
	        @if($result->Urine == '1')
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="urine" checked id="{{$result->Urine}}" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Urine</td>
	            </tr>
	        @endif
	        @if($result->Sputum == '1')
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="sputum" checked id="{$result->Sputum}}" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px"> Sputum </td>
	            </tr>
	        @endif
	        @if($result->OtherSample == '1')
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="othersample" checked id="othersample" style="font-size: 17.5pt !important;" />
	                </td>
	                <td style="padding-left:20px">Other</td>
	            </tr>
	            @endif
	    </table>
	    @if($result->OtherSample == '1')
        <table>
            <tr class="othersamplespecify">
                <td style="font-family: elite !important;">Other(Specify):</td>
                <td style="padding-left:20px;">
                    {{$result->OtherSampleSpecify}}
                </td>
            </tr>
        </table>
        @endif
		
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table style="width:100%;">
			@foreach($requisition as $req)
			<tr>
				<th style="font-family: elite !important;">Ordered By:</th><td>{{$req->rprovider->FirstName.' '. $req->rprovider->LastName}}</td>
				@php
                    $otime = explode(" ",$req->created_at)
                @endphp
				<th >Date:</th><td>{{$otime[0]}}</td>
				<th >Time:</th><td>{{$otime[1]}}</td>

			</tr>
			@endforeach

			@foreach($samplecollection as $sample)
            <tr>
				<th >Collected By:</th><td>{{$sample->lscprovider->FirstName.' '. $sample->lscprovider->LastName}}</td>
				@php
                    $ctime = explode(" ",$sample->created_at)
                @endphp
				<th >Date:</th><td>{{$ctime[0]}}</td>
				<th >Time:</th><td>{{$ctime[1]}}</td>

			</tr>
            @endforeach
            <tr>
				<th >Tested By:</td><td>{{$result->grprovider->FirstName.' '. $result->grprovider->LastName}}</td>
				@php
                    $ttime = explode(" ",$result->created_at)
                @endphp
				<th >Date:</th><td>{{$ttime[0]}}</td>
				<th >Time:</th><td>{{$ttime[1]}}</td>

			</tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table style="width:100%;">
			<tr><th >Hemoglobin:</th><td>{{$result->HemoglobinResults}}</td></tr>
            <tr><th >Peripheral Smear:</th><td>{{$result->PeripheralSmearResults}}</td></tr>
            <tr><th >Syphillis:</th><td>@if($result->SyphillisResults != null)  {{$posneg[$result->SyphillisResults]}} @endif</td></tr>
            <tr><th >RPR:</th><td>@if($result->RPR != null) {{$prpresult[$result->RPR]}} @endif</td></tr>
            <tr><th >Blood Glucose:</th><td>{{$result->BloodGlucoseResults}}</td></tr>
            <tr><th >Blood Smear, Parasites:</th><td>@if($result->ParasitesSeen != null){{$posneg[$result->ParasitesSeen]}} @endif</td>
            	<td>
            		<th>Quantity</th><td>@if($result->ParasiteQuantity != null) {{$quantity[$result->ParasiteQuantity]}} @endif</td>
            		<th>Species</th><td>
            			@if($result->BloodSmearParasiteSpecies != null)
            				{{$parasitespecies[$result->BloodSmearParasiteSpecies]}}
            			@endif
            			</td>
            	</td>
            </tr>
            <tr><th >Smear Slide Comments</th><td>{{$result->BloodSmearResultComments}}</td></tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<div>
			<div style="width:32%; display: inline-block;vertical-align: top">
				<table style="width:100%;">
					<tr style="background: #d6d6d6"><th colspan="2" style="text-align:center;">Urine Dipstick</th></tr>
					<tr><th >Color:</th><td>@if($result->UrineColor != null) {{$urinecolor[$result->UrineColor]}} @endif</td></tr>
		            <tr><th >Clarity:</th><td>@if($result->UrineClarity != null) {{$urineclarity[$result->UrineClarity]}} @endif</td></tr>
		            <tr><th >Sp.Gr:</th><td>@if($result->UrineSpecificGravity != null) {{$urinegrav[$result->UrineSpecificGravity]}} @endif</td></tr>
		            <tr><th >PH:</th><td>{{$result->UrinePH}}</td></tr>
		            <tr><th >Nitrites:</th><td>@if($result->UrineNitrites != null) {{$posneg[$result->UrineNitrites]}} @endif</td></tr>
		            <tr><th >Protein:</th><td>@if($result->UrineProtein != null) {{$urineprotein[$result->UrineProtein]}} @endif</td></tr>
		            <tr><th >Glucose:</th><td>@if($result->UrineGlucose != null) {{$urineglucose[$result->UrineGlucose]}} @endif</td></tr>
		            <tr><th >Ketones:</th><td>@if($result->UrineKetones != null) {{$urineleuko[$result->UrineKetones]}} @endif</td></tr>
		            <tr><th >Urobil:</th><td>@if($result->UrineUrobil != null) {{$urineurobil[$result->UrineUrobil]}} @endif</td></tr>
		            <tr><th >Biliruin:</th><td>@if($result->UrineBilirubin != null) {{$urineurobil[$result->UrineBilirubin]}} @endif</td></tr>
		            <tr><th >Blood:</th><td>@if($result->UrineBlood != null) {{$urineblood[$result->UrineBlood]}} @endif</td></tr>
		            <tr><th >Leukocytes:</th><td>@if($result->UrineLeuk != null) {{$urineleuko[$result->UrineLeuk]}} @endif</td></tr>
				</table>
			</div>
			<div style="width:32%;display: inline-block; vertical-align: top">
				<table style="width:100%">
					<tr style="background: #d6d6d6;"><th colspan="2" style="text-align:center;">Urine Miscroscopic</th></tr>
					<tr><th >WBCs:</td><td>{{$result->UrineWBCs}}</td></tr>
				    <tr><th >RBCs</td><td>{{$result->UrineRBCs}}</td></tr>
				    <tr><th >Epis</th><td>{{$result->UrineEpis}}</td></tr>
				    <tr><th >Casts:</th><td>{{$result->UrineCasts}}</td></tr>
				    <tr><th >Crystals:</th><td>{{$result->UrineCrystals}}</td></tr>
				    <tr><th >Yeast:</th><td>{{$result->UrineYeast}}</td></tr>
				    <tr><th >Org:</th><td>{{$result->UrineOrg}}</th></tr>
				    <tr><th >Urine Pregnancy Results:</th><td>@if($result->UrinePregnancy != null) {{$posneg[$result->UrinePregnancy]}}
                        @endif</td></tr>
			    </table>
			</div>
			<div style="width:33%;display: inline-block;vertical-align: top">
				<table style="width:100%;">
					<tr style="background: #d6d6d6"><th colspan="2" style="text-align:center;">Stool, Direct Exam</th></tr>
					<tr><th >Form:</th><td>@if($result->StoolForm != null) {{$stool[$result->StoolForm]}} @endif</td></tr>
				    <tr><th >Parasites Seen:</th><td>@if($result->StoolParasitesSeen != null) {{$yesno[$result->StoolParasitesSeen]}} @endif</td></tr>
				    <tr><th >Parasites(genus species):</th><td>{{$result->StoolParasiteSpecies}}</td></tr>
				    <tr><th >WBCs:</th><td>{{$result->StoolWBCs}}</td></tr>
				    <tr><th >Yeast:</th><td>{{$result->StoolYeast}}</td></tr>
				    <tr><th  >Gram Stain:</th></tr>
				    <tr><th >Source:</th><td>@if($result->GramStainSource != null) {{$stainsource[$result->GramStainSource]}} @endif</td></tr>
				    <tr><th >Organisms Seen:</th><td>@if($result->GramStainOrganismsSeen != null) {{$yesno[$result->GramStainOrganismsSeen]}} @endif</td></tr>
				    <tr><th >Organisms:</th><td>{{$result->GramStainOrganisms}}</td></tr>
				    <tr><td></td></tr>
				    <tr><td></td></tr>
				    <tr><td></td></tr>
			    </table>
			</div>
		</div>
		<table style="width:100%;margin-top: 20px;">
			<tr>
				<th align="left">AFB Smear(Direct) Lymph</th>
				<td>
					@if($result->AFBSmearLymph != null)
						{{$yesno[$result->AFBSmearLymph]}}
					@endif
				</td>
					
				<th align="left">AFB Smear(Direct) Sputum</th>
				<td>
					@if($result->AFBSmearSputum != null)
						{{$yesno[$result->AFBSmearSputum]}}
					@endif
				</td>
			</tr>
			<tr>
				<th align="left">AFB Seen</th>
				<td>
					@if($result->AFBSmearLymph != null)
						{{$yesno[$result->AFBSmearLymph]}}
					@endif
				</td>
				<th align="left">AFB Seen</th>
				<td>
					@if($result->AFBSmearSputum != null)
						{{$yesno[$result->AFBSmearSputum]}}
					@endif
				</td>
			</tr>
            
		</table>
		<div class="footer" style="margin-right: 5px;position:fixed; bottom:60px; right:60px;">
	        <div style="font-size: 10px !important; text-align: right;">Powered by OpenICEA</div>
	    </div>	
	@endforeach
</body>
</html>