<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#sampledetails" class="nav-link active" onclick="mytabs(this);">Sample Details</a>
    </li>
    <li class="nav-item">
        <a href="#generalsmears" class="nav-link" onclick="mytabs(this);">General Smears</a>
    </li>
    <li class="nav-item">
        <a href="#urinedipstick" class="nav-link" onclick="mytabs(this);">Urine Dipstick</a>
    </li>
    <li class="nav-item">
        <a href="#urinemicroscopy" class="nav-link" onclick="mytabs(this);">Urine Microscopy and Pregnancy</a>
    </li>
    <li class="nav-item">
        <a href="#stoolandgram" class="nav-link" onclick="mytabs(this);">Stool and Gram Stain</a>
    </li>
    <li class="nav-item">
        <a href="#tbtestresults" class="nav-link" onclick="mytabs(this);">TB Test Results</a>
    </li>
    <li class="nav-item">
        <a href="#crag" class="nav-link" onclick="mytabs(this);">CRAG</a>
    </li>
</ul>

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
<form id="msform" class="encounterform" >

    {{ csrf_field() }}
    <div class="mytabs" id="sampledetails">
        @foreach($results as $result)
        <!-- client information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Client Information</h2>
            <table class="prescription_table" style="margin-bottom:5px">
                <input type="hidden" name="resultno" value="{{$result->OID}}">
                <tr>
                    <td style="width: 200px;">Client No:</td>
                    <td  style="border-bottom: solid 1px #d6d4d0;padding:3px;">
                     <p>{{$result->grpatient->IDCNO }}</p>
                </tr>
                <tr>
                    <td>Client Name:</td>
                    <td  style="border-bottom: solid 1px #d6d4d0; padding:3px;">
                     {{$result->grpatient->FirstName." ".$result->grpatient->Surname }}
                </tr>
            </table>

            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Sample Information</h2>
            <table class="prescription_table" style="margin-bottom:5px;max-width: 400px;">

                @if($result->PurpleTopTube == '1')
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Purple top tube [P], EDTA:</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="purpletoptube" value="1" checked/>
                        </td>
                    </tr>
                @endif
                @if($result->RedTopTube == '1')
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Red top tube [R]: </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="redtoptube" value="1" checked />
                        </td>
                    </tr>
                @endif
                @if($result->Urine == '1')
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Urine</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="urine" value="1"  checked />
                        </td>
                    </tr>
                @endif
                @if($result->Sputum == '1')
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;"> Sputum </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="sputum" value="1"  checked id="{$result->Sputum}}" />
                        </td>
                    </tr>
                @endif
                @if($result->OtherSample == '1')
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Other</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="othersample" value="1"  checked id="othersample"/>
                        </td>
                    </tr>
                    <tr class="othersamplespecify">
                        <td width="20">Other (Specify)</td>
                        <td width="10" >
                            <input type="text" name="othersamplespecify" value="{{$result->OtherSampleSpecify}}" style="width:auto; margin-right:5px;" />
                        </td>
                    </tr>
                @endif
            </table>
          
        <!-- sample information-->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Clinical Information</h2>
             <table class="prescription_table">
                @foreach($requisition as $req)
                <tr>
                    <td>Ordered By:</td><td>
                        <input type="hidden" name="requisitinno" id="requisitinno" value="{{$req->OID}}">
                        <input type="hidden" name="orderedbyoid" id="orderedbyoid" value="{{$req->rprovider->OID}}">
                        <input type="text" name="orderedby" value="{{$req->rprovider->FirstName.' '. $req->rprovider->LastName}}" >
                    </td>
                </tr>
                @endforeach
                @foreach($samplecollection as $sample)
                <tr>
                    <td>Collected By:</td><td> <input type="text" name="collectedby" value="{{$sample->lscprovider->FirstName.' '. $sample->lscprovider->LastName}}" ></td>
                </tr>
                @endforeach
                <tr>
                    <td>Collected Date:</td><td><input type="date" name="collecteddate" id="collecteddate" value="{{$result->CollectionDate}}"  ></td>
                    <td>Time:</td><td><input type="text" name="collectedtime" id="collectedtime" value="{{$result->CollectionTime}}" ></td>
                </tr>
                <tr>
                    <td>Tested By:</td><td> <input type="text" name="testedby" value="{{$result->grprovider->FirstName.' '. $result->grprovider->LastName}}" ></td>
                </tr>
                <tr>
                    @php
                        $time = explode(" ",$result->created_at)
                    @endphp
                    <td>Tested Date:</td><td><input type="text" name="testeddate" id="testeddate"  value="{{$time[0]}}"></td>
                    <td>Time:</td><td><input type="text" name="testedtime" id="testedtime"  value="{{$time[1]}}"></td>
                </tr>
               
            </table>     
    </div>

    <div class="mytabs" id="generalsmears" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Hemoglobin</h2></td></tr>
            <tr><td>Hemoglobin:</td><td> <input type="text" name="hemoglobin" value="{{$result->HemoglobinResults}}"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Periheral Smear</h2></td></tr>
            <tr><td>Periheral Smear</td><td><input type="text" name="periheralsmear" value="{{$result->PeripheralSmearResults}}"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Syphillis</h2></td></tr>
            <tr><td>Syphillis</td>
                
                <td>
                    <select name="syphillis">
                        @if($result->SyphillisResults != null)
                        <option value='{{$result->SyphillisResults}}'>{{$posneg[$result->SyphillisResults]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">RPR</h2></td></tr>
            <tr><td>RPR Result</td>
                <td>
                    <select name="prpresult">
                        @if($result->RPR != null)
                        <option value='{{$result->RPR}}'>{{$prpresult[$result->RPR]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>RPR Titre Value</td><td><input type="text" name="rprtitrevalue" value="{{$result->RPRTitreValue}}"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Glucose</h2></td></tr>
            <tr><td>Blood Glucose</td><td><input type="text" name="bloodglucose" value="{{$result->BloodGlucoseResults}}"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Smear</h2></td></tr>
            <tr><td>MRDT Results:</td>
                <td>
                    <select name="mrdtresults">
                        @if($result->MRDTResult != null)
                        <option value='{{$result->MRDTResult}}'>{{$posneg[$result->MRDTResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="parasitesseen">
                        @if($result->ParasitesSeen != null)
                        <option value='{{$result->ParasitesSeen}}'>{{$posneg[$result->ParasitesSeen]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Quantity:</td>
                <td>
                    <select name="parasitequantity">
                        @if($result->ParasiteQuantity != null)
                        <option value='{{$result->ParasiteQuantity}}'>{{$quantity[$result->ParasiteQuantity]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td>
                <td>
                    <select name="parasitespecies">
                        @if($result->BloodSmearParasiteSpecies != null)
                         <option value='{{$result->BloodSmearParasiteSpecies}}'>{{$parasitespecies[$result->BloodSmearParasiteSpecies]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><textarea name="smearcomments" style="min-width: 100%;" value='{{$result->BloodSmearResultComments}}' ></textarea></td>
            </tr> 
        </table>
    </div>

    <div class="mytabs" id="urinedipstick" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine Dipstick</h2></td></tr>
            <tr><td class="label" >Color</td>
                <td>
                    <select name="urinecolor">
                       @if($result->UrineColor != null)
                        <option value='{{$result->UrineColor}}'>{{$urinecolor[$result->UrineColor]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Clarity</td>
                <td>
                    <select name="urineclarity">
                        @if($result->UrineClarity != null)
                        <option value='{{$result->UrineClarity}}'>{{$urineclarity[$result->UrineClarity]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Specific Gravity:</td>
                <td>
                    <select name="urinegravity">
                        @if($result->UrineSpecificGravity != null)
                        <option value='{{$result->UrineSpecificGravity}}'>{{$urinegrav[$result->UrineSpecificGravity]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">pH:</td>
                <td>
                    <select name="urineph">
                        <option value='{{$result->UrinePH}}'>{{$result->UrinePH}}</option>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Nitrites:</td>
                <td>
                    <select name="urinenitrites">
                        @if($result->UrineNitrites != null)
                        <option value='{{$result->UrineNitrites}}'>{{$posneg[$result->UrineNitrites]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Leukocytes:</td>
                <td>
                    <select name="urineleukocytes">
                        @if($result->UrineLeuk != null)
                        <option value='{{$result->UrineLeuk}}'>{{$urineleuko[$result->UrineLeuk]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
             <tr><td class="label">Protein</td>
                <td>
                    <select name="urineprotein">
                        @if($result->UrineProtein != null)
                        <option value='{{$result->UrineProtein}}'>{{$urineprotein[$result->UrineProtein]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Glucose</td>
                <td>
                    <select name="urineglucose">
                        @if($result->UrineGlucose != null)
                        <option value='{{$result->UrineGlucose}}'>{{$urineglucose[$result->UrineGlucose]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Ketones:</td>
                <td>
                    <select name="urineketones">
                        @if($result->UrineKetones != null)
                        <option value='{{$result->UrineKetones}}'>{{$urineleuko[$result->UrineKetones]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Urobil:</td>
                <td>
                    <select name="urineurobil">
                        @if($result->UrineUrobil != null)
                        <option value='{{$result->UrineUrobil}}'>{{$urineurobil[$result->UrineUrobil]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Bilirubin:</td>
                <td>
                    <select name="urinebilirubin">
                        @if($result->UrineBilirubin != null)
                        <option value='{{$result->UrineBilirubin}}'>{{$urineleuko[$result->UrineBilirubin]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Blood:</td>
                <td>
                    <select name="urineblood">
                        @if($result->UrineBlood != null)
                        <option value='{{$result->UrineBlood}}'>{{$urineblood[$result->UrineBlood]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Urine LAM Results:</td>
                <td>
                    <select name="urinelamresults">
                        @if($result->UrineLAMResult != null)
                        <option value='{{$result->UrineLAMResult}}'>{{$posneg[$result->UrineLAMResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="mytabs" id="urinemicroscopy" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Microscopic</h2></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="urinewbc" value='{{$result->UrineWBCs}}' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>RBCs:</td><td> <input type="number" name="urinerbc" value='{{$result->UrineRBCs}}' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Epis:</td><td> <input type="number" name="urineeps" value='{{$result->UrineEpis}}' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Casts:</td><td> <input type="number" name="urinecasts" value='{{$result->UrineCasts}}' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Crystals:</td><td> <input type="text" name="urinecrystals" value='{{$result->UrineCrystals}}'></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="urineyeast" value='{{$result->UrineYeast}}'></td></tr>
            <tr><td>Org:</td><td> <input type="text" name="urineorg" value='{{$result->UrineOrg}}'></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Pregnancy</h2></td></tr>
            <tr><td>Result:</td>
                <td>
                    <select name="umpresult">
                        @if($result->UrinePregnancy != null)
                        <option value='{{$result->UrinePregnancy}}'>{{$posneg[$result->UrinePregnancy]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="mytabs" id="stoolandgram" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Stool Direct Exam</h2></td></tr>
            <tr><td>Stool Form:</td>
                <td>
                    <select name="stoolform">
                        @if($result->StoolForm != null)
                        <option value='{{$result->StoolForm}}'>{{$stool[$result->StoolForm]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="stoolparasiteseen">
                        @if($result->StoolParasitesSeen != null)
                        <option value='{{$result->StoolParasitesSeen}}'>{{$yesno[$result->StoolParasitesSeen]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td><td><input type="text" name="stoolparasitespecies" value='{{$result->StoolParasiteSpecies}}'></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="stoolwbc" value='{{$result->StoolWBCs}}' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="stoolyeast" value='{{$result->StoolYeast}}'></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Gram Stain</h2></td></tr>
            <tr><td>Source:</td>
                <td>
                    <select name="stainsource">
                        @if($result->GramStainSource != null)
                        <option value='{{$result->GramStainSource}}'>{{$stainsource[$result->GramStainSource]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Organisms Seen:</td>
                <td>
                    <select name="stainorganismsseen">
                        @if($result->GramStainOrganismsSeen != null)
                        <option value='{{$result->GramStainOrganismsSeen}}'>{{$yesno[$result->GramStainOrganismsSeen]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td>Organisms:</td><td><input type="text" name="stainorganisms" value='{{$result->GramStainOrganisms}}'></td></tr>
        </table>
    </div>
    <div class="mytabs" id="tbtestresults" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">AFB Smear</h2></td></tr>
            <tr><td class="label">(Direct) Lymph</td>
                <td>
                    <select name="tblymph">
                        @if($result->AFBSmearLymph != null)
                        <option value='{{$result->AFBSmearLymph}}'>{{$yesno[$result->AFBSmearLymph]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">(Direct) Sputum</td>
                <td>
                    <select name="tbsputum">
                        @if($result->AFBSmearSputum != null)
                        <option value='{{$result->AFBSmearSputum}}'>{{$yesno[$result->AFBSmearSputum]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">ZN Microscopy</h2></td></tr>
            <tr><td class="label">Result</td>
                <td>
                    <select name="znresult">
                         @if($result->ResultznMicroscopy != null)
                        <option value='{{$result->ResultznMicroscopy}}'>{{$posneg[$result->ResultznMicroscopy]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Level</td>
                <td>
                    <select name="znlevel">
                        @if($result->LevelznMicroscopy != null)
                        <option value='{{$result->LevelznMicroscopy}}'>{{$quantity[$result->LevelznMicroscopy]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Fluorescence Microscopy</h2></td></tr>
            <tr><td class="label">Result</td>
                <td>
                    <select name="flresult">
                        @if($result->ResultFlourescenceMicroscopy != null)
                        <option value='{{$result->ResultFlourescenceMicroscopy}}'>{{$posneg[$result->ResultFlourescenceMicroscopy]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Level</td>
                <td>
                    <select name="fllevel">
                       @if($result->LevelFlourescenceMicroscopy != null)
                        <option value='{{$result->LevelFlourescenceMicroscopy}}'>{{$quantity[$result->LevelFlourescenceMicroscopy]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Culture Sensitivity</h2></td></tr>
            <tr><td class="label">Culture:</td>
                <td>
                    <select name="tbculture">
                        @if($result->TBCultureDone != null)
                        <option value='{{$result->TBCultureDone}}'>{{$yesno[$result->TBCultureDone]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Culture Result:</td>
                <td>
                    <select name="tbcultureresults">
                        @if($result->TBCultureResult != null)
                        <option value='{{$result->TBCultureResult}}'>{{$posneg[$result->TBCultureResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Rifampicin:</td>
                <td>
                    <select name="rifampicin">
                        @if($result->RifampicinSensitivityResult != null)
                        <option value='{{$result->RifampicinSensitivityResult}}'>{{$sensresis[$result->RifampicinSensitivityResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Isoniazid:</td>
                <td>
                    <select name="isoniazid">
                        @if($result->IsoniazidSensitivityResult != null)
                        <option value='{{$result->IsoniazidSensitivityResult}}'>{{$sensresis[$result->IsoniazidSensitivityResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Pyrazinamide:</td>
                <td>
                    <select name="pyrazinamide">
                        @if($result->PyrazinamideSensitivityResult != null)
                        <option value='{{$result->PyrazinamideSensitivityResult}}'>{{$sensresis[$result->PyrazinamideSensitivityResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Ethambutol:</td>
                <td>
                    <select name="ethambutol">
                        @if($result->EthambutolSensitivityResult != null)
                        <option value='{{$result->EthambutolSensitivityResult}}'>{{$sensresis[$result->EthambutolSensitivityResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td class="label">Streptomycin:</td>
                <td>
                    <select name="streptomycin">
                        @if($result->StreptomycinSensitivityResult != null)
                        <option value='{{$result->StreptomycinSensitivityResult}}'>{{$sensresis[$result->StreptomycinSensitivityResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><textarea placeholder="Smear Slide Comments" name="smearcomments" style="min-width: 100%; "></textarea></td>
            </tr> 
        </table>
    </div>
    <div class="mytabs" id="crag" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">CRAG</h2></td></tr>
            <tr><td class="label">Result:</td>
                <td>
                    <select name="cragresult">
                         @if($result->CragResult != null)
                        <option value='{{$result->CragResult}}'>{{$posnegpen[$result->CragResult]}}</option>
                        @endif
                    </select>
                </td>
            </tr>
        </table>
    </div>
    @endforeach

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px;">Close</button>
        <input type="button" name="updateresults" class="action-button" value="Save" id="updateresults" />
    </div>
</form>

<script type="text/javascript">
    //Tabs
        function mytabs(r){
            var link = r.getAttribute('href');
            var id = link.split('#');
            $('.mytabs').css('display','none');
            $('.nav-link').removeClass('active');
            $('#'+id[1]).css('display','block');
            r.classList.add("active")
        }
    //Update Results
        $('#updateresults').unbind().bind('click', function(e){
            e.preventDefault();
            var form = new FormData(document.getElementById('msform'));
            var date = $('#labrequisitionsearch').val();
            $.ajax({
                type: 'post',
                data: form,
                url: '{{route("updateresults")}}',
                processData: false,
                contentType: false,
                success: function()
                {
                    
                    $(function () {
                       $('#mymodal2').modal('toggle');
                    });


                    $('#mymodal2').modal('hide');

                    $("#labtablebody").load('{{route("labrequisitions",["date"=>""])}}'+date+ ' #labtablebody');
                    toastr.success("General Requisition Results Updated");

                    $('#mymodal2').on('hidden.bs.modal', function () {
                       $('#mymodal .modal-dialog').removeClass("modal-lg");
                       $('#mymodal .modal-title').text('');
                    });
                },
                error: function(){
                    toastr.error("Something Went Wrong");
                    console.log('Error');   
                }, 
            });

        });
</script>