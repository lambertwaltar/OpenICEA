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

<?php
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

?>
<form id="msform" class="encounterform" >

    <?php echo e(csrf_field()); ?>

    <div class="mytabs" id="sampledetails">
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- client information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Client Information</h2>
            <table class="prescription_table" style="margin-bottom:5px">
                <tr>
                    <td style="width: 200px;">Client No:</td>
                    <td  style="border-bottom: solid 1px #d6d4d0;padding:3px;">
                     <p><?php echo e($result->grpatient->IDCNO); ?></p>
                </tr>
                <tr>
                    <td>Client Name:</td>
                    <td  style="border-bottom: solid 1px #d6d4d0; padding:3px;">
                     <?php echo e($result->grpatient->FirstName." ".$result->grpatient->Surname); ?>

                </tr>
            </table>

            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Sample Information</h2>
            <table class="prescription_table" style="margin-bottom:5px;max-width: 400px;">

                <?php if($result->PurpleTopTube == '1'): ?>
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Purple top tube [P], EDTA:</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="purpletoptube" checked/>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($result->RedTopTube == '1'): ?>
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Red top tube [R]: </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="redtoptube"  checked />
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($result->Urine == '1'): ?>
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Urine</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="urine" checked />
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($result->Sputum == '1'): ?>
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;"> Sputum </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="sputum" checked id="{$result->Sputum}}" />
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($result->OtherSample == '1'): ?>
                    <tr>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">Other</td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0;">
                            <input type="checkbox" name="othersample" checked id="othersample"/>
                        </td>
                    </tr>
                    <tr class="othersamplespecify">
                        <td width="20">Other (Specify)</td>
                        <td width="10" >
                            <input type="text" name="othersamplespecify" value="<?php echo e($result->OtherSampleSpecify); ?>" style="width:auto; margin-right:5px;" />
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
          
        <!-- sample information-->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Clinical Information</h2>
             <table class="prescription_table">
                <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>Ordered By:</td><td>
                        <input type="hidden" name="requisitinno" id="requisitinno" value="<?php echo e($req->OID); ?>">
                        <input type="hidden" name="orderedbyoid" id="orderedbyoid" value="<?php echo e($req->rprovider->OID); ?>">
                        <input type="text" name="orderedby" value="<?php echo e($req->rprovider->FirstName.' '. $req->rprovider->LastName); ?>" readonly>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $samplecollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>Collected By:</td><td> <input type="text" name="collectedby" value="<?php echo e($sample->lscprovider->FirstName.' '. $sample->lscprovider->LastName); ?>" readonly></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>Collected Date:</td><td><input type="date" name="collecteddate" id="collecteddate" value="<?php echo e($result->CollectionDate); ?>"  readonly></td>
                    <td>Time:</td><td><input type="text" name="collectedtime" id="collectedtime" value="<?php echo e($result->CollectionTime); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tested By:</td><td> <input type="text" name="testedby" value="<?php echo e($result->grprovider->FirstName.' '. $result->grprovider->LastName); ?>" readonly></td>
                </tr>
                <tr>
                    <?php
                        $time = explode(" ",$result->created_at)
                    ?>
                    <td>Tested Date:</td><td><input type="text" name="testeddate" id="testeddate" readonly value="<?php echo e($time[0]); ?>"></td>
                    <td>Time:</td><td><input type="text" name="testedtime" id="testedtime" readonly value="<?php echo e($time[1]); ?>"></td>
                </tr>
               
            </table>     
    </div>

    <div class="mytabs" id="generalsmears" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Hemoglobin</h2></td></tr>
            <tr><td>Hemoglobin:</td><td> <input type="text" name="hemoglobin" value="<?php echo e($result->HemoglobinResults); ?>"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Periheral Smear</h2></td></tr>
            <tr><td>Periheral Smear</td><td><input type="text" name="periheralsmear" value="<?php echo e($result->PeripheralSmearResults); ?>"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Syphillis</h2></td></tr>
            <tr><td>Syphillis</td>
                
                <td>
                    <select name="syphillis">
                        <?php if($result->SyphillisResults != null): ?>
                        <option value='<?php echo e($result->SyphillisResults); ?>'><?php echo e($posneg[$result->SyphillisResults]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">RPR</h2></td></tr>
            <tr><td>RPR Result</td>
                <td>
                    <select name="prpresult">
                        <?php if($result->RPR != null): ?>
                        <option value='<?php echo e($result->RPR); ?>'><?php echo e($prpresult[$result->RPR]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>RPR Titre Value</td><td><input type="text" name="rprtitrevalue" value="<?php echo e($result->RPRTitreValue); ?>"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Glucose</h2></td></tr>
            <tr><td>Blood Glucose</td><td><input type="text" name="bloodglucose" value="<?php echo e($result->BloodGlucoseResults); ?>"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Smear</h2></td></tr>
            <tr><td>MRDT Results:</td>
                <td>
                    <select name="mrdtresults">
                        <?php if($result->MRDTResult != null): ?>
                        <option value='<?php echo e($result->MRDTResult); ?>'><?php echo e($posneg[$result->MRDTResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="parasitesseen">
                        <?php if($result->ParasitesSeen != null): ?>
                        <option value='<?php echo e($result->ParasitesSeen); ?>'><?php echo e($posneg[$result->ParasitesSeen]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Quantity:</td>
                <td>
                    <select name="parasitequantity">
                        <?php if($result->ParasiteQuantity != null): ?>
                        <option value='<?php echo e($result->ParasiteQuantity); ?>'><?php echo e($quantity[$result->ParasiteQuantity]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td>
                <td>
                    <select name="parasitespecies">
                        <?php if($result->BloodSmearParasiteSpecies != null): ?>
                         <option value='<?php echo e($result->BloodSmearParasiteSpecies); ?>'><?php echo e($parasitespecies[$result->BloodSmearParasiteSpecies]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><textarea name="smearcomments" style="min-width: 100%;" value='<?php echo e($result->BloodSmearResultComments); ?>' ></textarea></td>
            </tr> 
        </table>
    </div>

    <div class="mytabs" id="urinedipstick" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine Dipstick</h2></td></tr>
            <tr><td class="label" >Color</td>
                <td>
                    <select name="urinecolor">
                       <?php if($result->UrineColor != null): ?>
                        <option value='<?php echo e($result->UrineColor); ?>'><?php echo e($urinecolor[$result->UrineColor]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Clarity</td>
                <td>
                    <select name="urineclarity">
                        <?php if($result->UrineClarity != null): ?>
                        <option value='<?php echo e($result->UrineClarity); ?>'><?php echo e($urineclarity[$result->UrineClarity]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Specific Gravity:</td>
                <td>
                    <select name="urinegravity">
                        <?php if($result->UrineSpecificGravity != null): ?>
                        <option value='<?php echo e($result->UrineSpecificGravity); ?>'><?php echo e($urinegrav[$result->UrineSpecificGravity]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">pH:</td>
                <td>
                    <select name="urineph">
                        <option value='<?php echo e($result->UrinePH); ?>'><?php echo e($result->UrinePH); ?></option>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Nitrites:</td>
                <td>
                    <select name="urinenitrites">
                        <?php if($result->UrineNitrites != null): ?>
                        <option value='<?php echo e($result->UrineNitrites); ?>'><?php echo e($posneg[$result->UrineNitrites]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Leukocytes:</td>
                <td>
                    <select name="urineleukocytes">
                        <?php if($result->UrineLeuk != null): ?>
                        <option value='<?php echo e($result->UrineLeuk); ?>'><?php echo e($urineleuko[$result->UrineLeuk]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
             <tr><td class="label">Protein</td>
                <td>
                    <select name="urineprotein">
                        <?php if($result->UrineProtein != null): ?>
                        <option value='<?php echo e($result->UrineProtein); ?>'><?php echo e($urineprotein[$result->UrineProtein]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Glucose</td>
                <td>
                    <select name="urineglucose">
                        <?php if($result->UrineGlucose != null): ?>
                        <option value='<?php echo e($result->UrineGlucose); ?>'><?php echo e($urineglucose[$result->UrineGlucose]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Ketones:</td>
                <td>
                    <select name="urineketones">
                        <?php if($result->UrineKetones != null): ?>
                        <option value='<?php echo e($result->UrineKetones); ?>'><?php echo e($urineleuko[$result->UrineKetones]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Urobil:</td>
                <td>
                    <select name="urineurobil">
                        <?php if($result->UrineUrobil != null): ?>
                        <option value='<?php echo e($result->UrineUrobil); ?>'><?php echo e($urineurobil[$result->UrineUrobil]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Bilirubin:</td>
                <td>
                    <select name="urinebilirubin">
                        <?php if($result->UrineBilirubin != null): ?>
                        <option value='<?php echo e($result->UrineBilirubin); ?>'><?php echo e($urineleuko[$result->UrineBilirubin]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Blood:</td>
                <td>
                    <select name="urineblood">
                        <?php if($result->UrineBlood != null): ?>
                        <option value='<?php echo e($result->UrineBlood); ?>'><?php echo e($urineblood[$result->UrineBlood]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Urine LAM Results:</td>
                <td>
                    <select name="urinelamresults">
                        <?php if($result->UrineLAMResult != null): ?>
                        <option value='<?php echo e($result->UrineLAMResult); ?>'><?php echo e($posneg[$result->UrineLAMResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="mytabs" id="urinemicroscopy" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Microscopic</h2></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="urinewbc" value='<?php echo e($result->UrineWBCs); ?>' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>RBCs:</td><td> <input type="number" name="urinerbc" value='<?php echo e($result->UrineRBCs); ?>' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Epis:</td><td> <input type="number" name="urineeps" value='<?php echo e($result->UrineEpis); ?>' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Casts:</td><td> <input type="number" name="urinecasts" value='<?php echo e($result->UrineCasts); ?>' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Crystals:</td><td> <input type="text" name="urinecrystals" value='<?php echo e($result->UrineCrystals); ?>'></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="urineyeast" value='<?php echo e($result->UrineYeast); ?>'></td></tr>
            <tr><td>Org:</td><td> <input type="text" name="urineorg" value='<?php echo e($result->UrineOrg); ?>'></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Pregnancy</h2></td></tr>
            <tr><td>Result:</td>
                <td>
                    <select name="umpresult">
                        <?php if($result->UrinePregnancy != null): ?>
                        <option value='<?php echo e($result->UrinePregnancy); ?>'><?php echo e($posneg[$result->UrinePregnancy]); ?></option>
                        <?php endif; ?>
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
                        <?php if($result->StoolForm != null): ?>
                        <option value='<?php echo e($result->StoolForm); ?>'><?php echo e($stool[$result->StoolForm]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="stoolparasiteseen">
                        <?php if($result->StoolParasitesSeen != null): ?>
                        <option value='<?php echo e($result->StoolParasitesSeen); ?>'><?php echo e($yesno[$result->StoolParasitesSeen]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td><td><input type="text" name="stoolparasitespecies" value='<?php echo e($result->StoolParasiteSpecies); ?>'></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="stoolwbc" value='<?php echo e($result->StoolWBCs); ?>' style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="stoolyeast" value='<?php echo e($result->StoolYeast); ?>'></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Gram Stain</h2></td></tr>
            <tr><td>Source:</td>
                <td>
                    <select name="stainsource">
                        <?php if($result->GramStainSource != null): ?>
                        <option value='<?php echo e($result->GramStainSource); ?>'><?php echo e($stainsource[$result->GramStainSource]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Organisms Seen:</td>
                <td>
                    <select name="stainorganismsseen">
                        <?php if($result->GramStainOrganismsSeen != null): ?>
                        <option value='<?php echo e($result->GramStainOrganismsSeen); ?>'><?php echo e($yesno[$result->GramStainOrganismsSeen]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Organisms:</td><td><input type="text" name="stainorganisms" value='<?php echo e($result->GramStainOrganisms); ?>'></td></tr>
        </table>
    </div>
    <div class="mytabs" id="tbtestresults" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">AFB Smear</h2></td></tr>
            <tr><td class="label">(Direct) Lymph</td>
                <td>
                    <select name="tblymph">
                        <?php if($result->AFBSmearLymph != null): ?>
                        <option value='<?php echo e($result->AFBSmearLymph); ?>'><?php echo e($yesno[$result->AFBSmearLymph]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">(Direct) Sputum</td>
                <td>
                    <select name="tbsputum">
                        <?php if($result->AFBSmearSputum != null): ?>
                        <option value='<?php echo e($result->AFBSmearSputum); ?>'><?php echo e($yesno[$result->AFBSmearSputum]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">ZN Microscopy</h2></td></tr>
            <tr><td class="label">Result</td>
                <td>
                    <select name="znresult">
                         <?php if($result->ResultznMicroscopy != null): ?>
                        <option value='<?php echo e($result->ResultznMicroscopy); ?>'><?php echo e($posneg[$result->ResultznMicroscopy]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Level</td>
                <td>
                    <select name="znlevel">
                        <?php if($result->LevelznMicroscopy != null): ?>
                        <option value='<?php echo e($result->LevelznMicroscopy); ?>'><?php echo e($quantity[$result->LevelznMicroscopy]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Fluorescence Microscopy</h2></td></tr>
            <tr><td class="label">Result</td>
                <td>
                    <select name="flresult">
                        <?php if($result->ResultFlourescenceMicroscopy != null): ?>
                        <option value='<?php echo e($result->ResultFlourescenceMicroscopy); ?>'><?php echo e($posneg[$result->ResultFlourescenceMicroscopy]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Level</td>
                <td>
                    <select name="fllevel">
                       <?php if($result->LevelFlourescenceMicroscopy != null): ?>
                        <option value='<?php echo e($result->LevelFlourescenceMicroscopy); ?>'><?php echo e($quantity[$result->LevelFlourescenceMicroscopy]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Culture Sensitivity</h2></td></tr>
            <tr><td class="label">Culture:</td>
                <td>
                    <select name="tbculture">
                        <?php if($result->TBCultureDone != null): ?>
                        <option value='<?php echo e($result->TBCultureDone); ?>'><?php echo e($yesno[$result->TBCultureDone]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Culture Result:</td>
                <td>
                    <select name="tbcultureresults">
                        <?php if($result->TBCultureResult != null): ?>
                        <option value='<?php echo e($result->TBCultureResult); ?>'><?php echo e($posneg[$result->TBCultureResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Rifampicin:</td>
                <td>
                    <select name="rifampicin">
                        <?php if($result->RifampicinSensitivityResult != null): ?>
                        <option value='<?php echo e($result->RifampicinSensitivityResult); ?>'><?php echo e($sensresis[$result->RifampicinSensitivityResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Isoniazid:</td>
                <td>
                    <select name="isoniazid">
                        <?php if($result->IsoniazidSensitivityResult != null): ?>
                        <option value='<?php echo e($result->IsoniazidSensitivityResult); ?>'><?php echo e($sensresis[$result->IsoniazidSensitivityResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Pyrazinamide:</td>
                <td>
                    <select name="pyrazinamide">
                        <?php if($result->PyrazinamideSensitivityResult != null): ?>
                        <option value='<?php echo e($result->PyrazinamideSensitivityResult); ?>'><?php echo e($sensresis[$result->PyrazinamideSensitivityResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Ethambutol:</td>
                <td>
                    <select name="ethambutol">
                        <?php if($result->EthambutolSensitivityResult != null): ?>
                        <option value='<?php echo e($result->EthambutolSensitivityResult); ?>'><?php echo e($sensresis[$result->EthambutolSensitivityResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr><td class="label">Streptomycin:</td>
                <td>
                    <select name="streptomycin">
                        <?php if($result->StreptomycinSensitivityResult != null): ?>
                        <option value='<?php echo e($result->StreptomycinSensitivityResult); ?>'><?php echo e($sensresis[$result->StreptomycinSensitivityResult]); ?></option>
                        <?php endif; ?>
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
                         <?php if($result->CragResult != null): ?>
                        <option value='<?php echo e($result->CragResult); ?>'><?php echo e($posnegpen[$result->CragResult]); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="modal-footer">
        <a href="<?php echo e(route('printresults', ['id' => Crypt::encrypt($req->OID)])); ?>" class="btn btn-secondary" id="printresults" target="_blank" style="font-size: 12px;">Print Preview</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px;">Close</button>
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

        $(document).ready(function(){
            $('input').prop('readonly',true);
            $('select').prop('disabled',true).css({'background':'#f2f2f2','width':'100%'});
            $('textarea').prop('readonly',true).css('background','#f2f2f2');
        });
    
        $('#mymodal').on('hidden.bs.modal', function () {
           $('input').prop('readonly',false);
            $('select').prop('disabled',false).css({'background':''});
            $('textarea').prop('readonly',false).css('background','');
           
        });
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/viewresults.blade.php ENDPATH**/ ?>