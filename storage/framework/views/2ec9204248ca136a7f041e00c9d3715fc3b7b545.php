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


<form id="msform" class="encounterform" >
    <?php echo e(csrf_field()); ?>

    <div class="mytabs" id="sampledetails">
        <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- client information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Client Information</h2>
            <input type="hidden" name="requisitionno" id="requisitionno" value="<?php echo e($req->OID); ?>">
            <input type="hidden" name="encounter" id="encounter" value="<?php echo e($req->rencounter->OID); ?>">
            <input type="hidden" name="idcno" id="idcno" value="<?php echo e($req->rpatient->IDCNO); ?>">
            <table class="prescription_table" style="margin-bottom:5px">
                <tr>
                    <td>Client Number</td>
                    <td  style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                     <p><?php echo e($req->rpatient->IDCNO); ?></p>
                </tr>
                <tr>
                    <td>Client Name</td>
                    <td  style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                     <?php echo e($req->rpatient->FirstName." ".$req->rpatient->Surname); ?>

                </tr>
            </table>

            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Sample Information</h2>
            <table class="prescription_table" style="margin-bottom:5px;max-width: 400px;">
                <?php $__currentLoopData = $req->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php if($sample->labsample->Name == 'Blood'): ?>
                        <tr>
                            <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                                <label for="purpletoptube" style="cursor: pointer;">Purple top tube [P], EDTA:</label>
                            </td>
                            <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                                <input type="checkbox" name="purpletoptube" value="1" style="width:auto; margin-right:5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                                <label for="redtoptube" style="cursor: pointer;">Red top tube [R]:</label>
                            </td>
                            <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                                <input type="checkbox" name="redtoptube" value="1" style="width:auto; margin-right:5px;" />
                            </td>
                        </tr>
                    <?php elseif(str_contains($sample->labsample->Name, 'Urine')): ?>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                            <label for="<?php echo e($sample->labsample->OID); ?>" style="cursor: pointer;"><?php echo e($sample->labsample->Name); ?></label>
                        </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                            <input type="checkbox" name="urine" value="1" id="<?php echo e($sample->labsample->OID); ?>" style="width:auto; margin-right:5px;" />
                        </td>
                    <?php elseif(str_contains($sample->labsample->Name, 'Sputum')): ?>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                            <label for="<?php echo e($sample->labsample->OID); ?>" style="cursor: pointer;"><?php echo e($sample->labsample->Name); ?></label>
                        </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                            <input type="checkbox" name="sputum" value="1" id="<?php echo e($sample->labsample->OID); ?>" style="width:auto; margin-right:5px;" />
                        </td>
                    <?php else: ?>
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                            <label for="<?php echo e($sample->labsample->OID); ?>" style="cursor: pointer;"><?php echo e($sample->labsample->Name); ?></label>
                        </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                            <input type="checkbox" name="samples" value="<?php echo e($sample->labsample->OID); ?>" id="<?php echo e($sample->labsample->OID); ?>" style="width:auto; margin-right:5px;" />
                        </td>

                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                        <label for="othersample" style="cursor: pointer;">Other</label>
                    </td>
                    <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                        <input type="checkbox" name="othersample" value="1" id="othersample" style="width:auto; margin-right:5px;" />
                    </td>
                </tr>
                <tr style="display:none;" class="othersamplespecify">
                    <td width="20">
                        <label for="othersamplespecify" style="cursor: pointer;">Other (Specify)</label>
                    </td>
                    <td width="10" >
                        <input type="text" name="othersamplespecify" style="width:auto; margin-right:5px;" />
                    </td>
                </tr>
            </table>
          
        <!-- sample information-->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Clinical Information</h2>
             <table class="prescription_table">
                <tr>
                    <td>Ordered By:</td><td>
                        <input type="hidden" name="orderedbyoid" id="orderedbyoid" value="<?php echo e($req->rprovider->OID); ?>">
                        <input type="text" name="orderedby" value="<?php echo e($req->rprovider->FirstName.' '. $req->rprovider->LastName); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Collected By:</td><td> <input type="text" name="collectedby" value="<?php echo e($req->CollectedBy); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Collected Date:</td><td><input type="date" name="collecteddate" id="collecteddate" value="<?php echo e($req->CollectedDate); ?>"  readonly></td>
                    <?php
                        $time = explode(" ",$req->created_at)
                    ?>
                    <td>Time:</td><td><input type="text" name="collectedtime" id="collectedtime" value="<?php echo e($time[1]); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tested By:</td><td> <input type="text" name="testedby" value="<?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tested Date:</td><td><input type="date" name="testeddate" id="testeddate"></td>
                    <td>Time:</td><td><input type="text" name="testedtime" id="testedtime" readonly></td>
                </tr>
               
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="mytabs" id="generalsmears" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Hemoglobin</h2></td></tr>
            <tr><td>Hemoglobin:</td><td> <input type="text" name="hemoglobin"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Periheral Smear</h2></td></tr>
            <tr><td>Periheral Smear</td><td><input type="text" name="periheralsmear"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Syphillis</h2></td></tr>
            <tr><td>Syphillis</td>
                <td>
                    <select name="syphillis">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">RPR</h2></td></tr>
            <tr><td>RPR Result</td>
                <td>
                    <select name="prpresult">
                        <option value=''>---</option>
                        <option value='1'>Reactive</option>
                        <option value='2'>Non-Reactive</option>
                    </select>
                </td>
            </tr>
            <tr><td>RPR Titre Value</td><td><input type="text" name="rprtitrevalue" readonly></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Glucose</h2></td></tr>
            <tr><td>Blood Glucose</td><td><input type="text" name="bloodglucose"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Blood Smear</h2></td></tr>
            <tr><td>MRDT Results:</td>
                <td>
                    <select name="mrdtresults">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="parasitesseen">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Quantity:</td>
                <td>
                    <select name="parasitequantity">
                        <option value=''>---</option>
                        <option value='1'>+</option>
                        <option value='2'>+ +</option>
                        <option value='3'>+ + +</option>
                        <option value='4'>+ + + +</option>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td>
                <td>
                    <select name="parasitespecies">
                        <option value=''>---</option>
                        <option value='1'>Falciparum</option>
                        <option value='2'>Malariae</option>
                        <option value='3'>Ovale</option>
                        <option value='4'>Vivax</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><textarea placeholder="Smear Slide Comments" name="smearcomments" style="min-width: 100%; "></textarea></td>
            </tr> 
        </table>
    </div>

    <div class="mytabs" id="urinedipstick" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine Dipstick</h2></td></tr>
            <tr><td>Color</td>
                <td>
                    <select name="urinecolor">
                        <option value=''>---</option>
                        <option value='1'>Yellow</option>
                        <option value='2'>Amber</option>
                        <option value='3'>Blood Stained</option>
                    </select>
                </td>
            </tr>
            <tr><td>Clarity</td>
                <td>
                    <select name="urineclarity">
                        <option value=''>---</option>
                        <option value='1'>Clear</option>
                        <option value='2'>Turbid</option>
                    </select>
                </td>
            </tr>
            <tr><td>Specific Gravity:</td>
                <td>
                    <select name="urinegravity">
                        <option value=''>---</option>
                        <option value='1'>1.000</option>
                        <option value='2'>1.005</option>
                        <option value='3'>1.010</option>
                        <option value='4'>1.015</option>
                        <option value='5'>1.020</option>
                        <option value='6'>1.025</option>
                        <option value='7'>1.030</option>
                    </select>
                </td>
            </tr>
            <tr><td>pH:</td>
                <td>
                    <select name="urineph">
                        <option value=''>---</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                    </select>
                </td>
            </tr>
            <tr><td>Nitrites:</td>
                <td>
                    <select name="urinenitrites">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Leukocytes:</td>
                <td>
                    <select name="urineleukocytes">
                        <option value=''>---</option>
                        <option value='1'>Negative</option>
                        <option value='2'>+</option>
                        <option value='3'>+ +</option>
                        <option value='4'>+ + +</option>
                    </select>
                </td>
            </tr>
             <tr><td>Protein</td>
                <td>
                    <select name="urineprotein">
                        <option value=''>---</option>
                        <option value='1'>Negative</option>
                        <option value='2'>30</option>
                        <option value='3'>100</option>
                        <option value='4'>500</option>
                    </select>
                </td>
            </tr>
            <tr><td>Glucose</td>
                <td>
                    <select name="urineglucose">
                        <option value=''>---</option>
                        <option value='1'>Normal</option>
                        <option value='2'>30</option>
                        <option value='3'>100</option>
                        <option value='4'>300</option>
                        <option value='4'>500</option>
                    </select>
                </td>
            </tr>
            <tr><td>Ketones:</td>
                <td>
                    <select name="urineketones">
                        <option value=''>---</option>
                        <option value='1'>Negative</option>
                        <option value='2'>+</option>
                        <option value='3'>+ +</option>
                        <option value='4'>+ + +</option>
                    </select>
                </td>
            </tr>
            <tr><td>Urobil:</td>
                <td>
                    <select name="urineurobil">
                        <option value=''>---</option>
                        <option value='1'>Normal</option>
                        <option value='2'>+</option>
                        <option value='3'>+ +</option>
                        <option value='4'>+ + +</option>
                    </select>
                </td>
            </tr>
            <tr><td>Bilirubin:</td>
                <td>
                    <select name="urinebilirubin">
                        <option value=''>---</option>
                        <option value='1'>Negative</option>
                        <option value='2'>+</option>
                        <option value='3'>+ +</option>
                        <option value='4'>+ + +</option>
                    </select>
                </td>
            </tr>
            <tr><td>Blood:</td>
                <td>
                    <select name="urineblood">
                        <option value=''>---</option>
                        <option value='1'>Negative</option>
                        <option value='2'>+</option>
                        <option value='3'>+ +</option>
                        <option value='4'>+ + +</option>
                        <option value='5'>+ + + +</option>
                    </select>
                </td>
            </tr>
            <tr><td>Urine LAM Results:</td>
                <td>
                    <select name="urinelamresults">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="mytabs" id="urinemicroscopy" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Microscopic</h2></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="urinewbc" style="-moz-appearance: textfield;"></td></tr>
            <tr><td>RBCs:</td><td> <input type="number" name="urinerbc" style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Epis:</td><td> <input type="number" name="urineeps" style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Casts:</td><td> <input type="number" name="urinecasts" style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Crystals:</td><td> <input type="text" name="urinecrystals"></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="urineyeast"></td></tr>
            <tr><td>Org:</td><td> <input type="text" name="urineorg"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Urine - Pregnancy</h2></td></tr>
            <tr><td>Result:</td>
                <td>
                    <select name="umpresult">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
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
                        <option value=''>---</option>
                        <option value='1'>Semi Formed</option>
                        <option value='2'>Formed</option>
                        <option value='3'>Diarrhoeic</option>
                        <option value='4'>Loose</option>
                    </select>
                </td>
            </tr>
            <tr><td>Parasites Seen:</td>
                <td>
                    <select name="stoolparasiteseen">
                        <option value=''>---</option>
                        <option value='1'>Yes</option>
                        <option value='2'>No</option>
                    </select>
                </td>
            </tr>
            <tr><td>Parasite Species:</td><td><input type="text" name="stoolparasitespecies" readonly></td></tr>
            <tr><td>WBCs:</td><td> <input type="number" name="stoolwbc" style="-moz-appearance: textfield;"></td></tr>
            <tr><td>Yeast:</td><td> <input type="text" name="stoolyeast"></td></tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Gram Stain</h2></td></tr>
            <tr><td>Source:</td>
                <td>
                    <select name="stainsource">
                        <option value=''>---</option>
                        <option value='1'>Urine</option>
                        <option value='2'>Stool</option>
                        <option value='3'>Aspirate</option>
                        <option value='4'>Pleural Fluid</option>
                    </select>
                </td>
            </tr>
            <tr><td>Organisms Seen:</td>
                <td>
                    <select name="stainorganismsseen">
                        <option value=''>---</option>
                        <option value='1'>Yes</option>
                        <option value='2'>No</option>
                    </select>
                </td>
            </tr>
            <tr><td>Organisms:</td><td><input type="text" name="stainorganisms" readonly></td></tr>
        </table>
    </div>
    <div class="mytabs" id="tbtestresults" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">AFB Smear</h2></td></tr>
            <tr><td>(Direct) Lymph</td>
                <td>
                    <select name="tblymph">
                        <option value=''>---</option>
                        <option value='1'>Yes</option>
                        <option value='2'>No</option>
                    </select>
                </td>
            </tr>
            <tr><td>(Direct) Sputum</td>
                <td>
                    <select name="tbsputum">
                        <option value=''>---</option>
                        <option value='1'>Yes</option>
                        <option value='2'>No</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">ZN Microscopy</h2></td></tr>
            <tr><td>Result</td>
                <td>
                    <select name="znresult">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Level</td>
                <td>
                    <select name="znlevel">
                        <option value=''>---</option>
                        <option value='1'>+</option>
                        <option value='2'>+ +</option>
                        <option value='3'>+ + +</option>
                        <option value='4'>+ + + +</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Fluorescence Microscopy</h2></td></tr>
            <tr><td>Result</td>
                <td>
                    <select name="flresult">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Level</td>
                <td>
                    <select name="fllevel">
                        <option value=''>---</option>
                        <option value='1'>+</option>
                        <option value='2'>+ +</option>
                        <option value='3'>+ + +</option>
                        <option value='4'>+ + + +</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Culture Sensitivity</h2></td></tr>
            <tr><td>Culture:</td>
                <td>
                    <select name="tbculture">
                        <option value=''>---</option>
                        <option value='1'>Yes</option>
                        <option value='2'>No</option>
                    </select>
                </td>
            </tr>
            <tr><td>Culture Result:</td>
                <td>
                    <select name="tbcultureresults">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                    </select>
                </td>
            </tr>
            <tr><td>Rifampicin:</td>
                <td>
                    <select name="rifampicin">
                        <option value=''>---</option>
                        <option value='1'>Sensitive</option>
                        <option value='2'>Resistant</option>
                    </select>
                </td>
            </tr>
            <tr><td>Isoniazid:</td>
                <td>
                    <select name="isoniazid">
                        <option value=''>---</option>
                        <option value='1'>Sensitive</option>
                        <option value='2'>Resistant</option>
                    </select>
                </td>
            </tr>
            <tr><td>Pyrazinamide:</td>
                <td>
                    <select name="pyrazinamide">
                        <option value=''>---</option>
                        <option value='1'>Sensitive</option>
                        <option value='2'>Resistant</option>
                    </select>
                </td>
            </tr>
            <tr><td>Ethambutol:</td>
                <td>
                    <select name="ethambutol">
                        <option value=''>---</option>
                        <option value='1'>Sensitive</option>
                        <option value='2'>Resistant</option>
                    </select>
                </td>
            </tr>
            <tr><td>Streptomycin:</td>
                <td>
                    <select name="streptomycin">
                        <option value=''>---</option>
                        <option value='1'>Sensitive</option>
                        <option value='2'>Resistant</option>
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
            <tr><td>Result:</td>
                <td>
                    <select name="cragresult">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                        <option value='3'>Pending</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savegeneralresults" class="action-button" value="Save" id="savegeneralresults" />
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

    //form dynamics
        $('select[name=prpresult]').on('change', function(){
            var prpresult = $('select[name=prpresult]').val()
            if(prpresult==1){
                $('input[name=rprtitrevalue]').attr('readonly',false);
            }
            else{
                $('input[name=rprtitrevalue]').attr('readonly',true);
            }
        });

        $('select[name=stoolparasiteseen]').on('change', function(){
            var stoolparasiteseen = $('select[name=stoolparasiteseen]').val()
            if(stoolparasiteseen==1){
                $('input[name=stoolparasitespecies]').attr('readonly',false);
            }
            else{
                $('input[name=stoolparasitespecies]').attr('readonly',true);
            }
        });

        $('select[name=stainorganismsseen]').on('change', function(){
            var stainorganismsseen = $('select[name=stainorganismsseen]').val()
            if(stainorganismsseen==1){
                $('input[name=stainorganisms]').attr('readonly',false);
            }
            else{
                $('input[name=stainorganisms]').attr('readonly',true);
            }
        });
        

    //date
        $(document).ready(function () {
            var fullDate = new Date(),
            month = '' + (fullDate.getMonth() + 1),
            day = '' + fullDate.getDate(),
            year = fullDate.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            
            $('input[name="testeddate"]').attr('min', [year, month, day].join('-'));
            $('input[name="testeddate"]').val([year, month, day].join('-'));

            //ordered time
            var hours = fullDate.getHours();
            var minutes = fullDate.getMinutes();
            var seconds = fullDate.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            $('input[name="testedtime"]').val([hours, minutes, seconds].join(':')+" "+ampm);

        });

    //other options
        $(document).on('change','input[name=othersample]', function(){
            if(document.getElementById("othersample").checked == true){
               $('.othersamplespecify').css('display', 'block');
            }
            else{
                $('.othersamplespecify').css('display', 'none');
            }

         });
    //Submit Results
        $('#savegeneralresults').unbind().bind('click', function(e){
            e.preventDefault();
            var form = new FormData(document.getElementById('msform'));
            var date = $('#labrequisitionsearch').val();
            $.ajax({
                type: 'post',
                data: form,
                url: '<?php echo e(route("savegeneralresults")); ?>',
                processData: false,
                contentType: false,
                success: function()
                {
                    $('#mymodal').modal('hide');
                    // $("#labtablebody").load("<?php echo e(route('labrequisitions')); ?>"+ " #labtablebody");

                    $("#labtablebody").load('<?php echo e(route("labrequisitions",["date"=>""])); ?>'+date+ ' #labtablebody');
                    toastr.success("General Requisition Results Submitted");

                    $('#mymodal').on('hidden.bs.modal', function () {
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
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/submitgenresults.blade.php ENDPATH**/ ?>