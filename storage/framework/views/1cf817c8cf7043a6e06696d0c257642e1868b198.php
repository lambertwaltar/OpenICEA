<!DOCTYPE html>
<html>
<head>
	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$patient = $result->grpatient->FirstName." ".$result->grpatient->Surname;
            $encounter = $result->grencounter->visitDate;
            $pdfname = $patient.' [Encounter-'.$encounter.']';
		?>
		<title><?php echo e($pdfname); ?></title>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	<!-- <div style="text-align: center; font-size:24px !important;">ADULT INFECTIOUS DISEASES CLINIC SIDE LAB</div> -->
	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
				<td>Client No: <?php echo e($result->grpatient->IDCNO); ?></td>
				<td><?php echo e($result->grpatient->FirstName." ".$result->grpatient->Surname); ?></td>
			</tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table>
			<tr>
				<td  rowspan="8" style="padding:0 10px;vertical-align: middle;background: #d6d6d6">Sample Type</td>
			</tr>
			<?php if($result->PurpleTopTube == '1'): ?>
	            <tr>
	            	<td class="checkbox">
	                    <input type="checkbox" name="purpletoptube" checked id="<?php echo e($result->PurpleTopTube); ?>" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Purple top tube [P], EDTA:</td>
	            </tr>
	        <?php endif; ?>
			<?php if($result->RedTopTube == '1'): ?>
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="redtoptube"  checked id="<?php echo e($result->RedTopTube); ?>" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Red top tube [R]: </td>
	            </tr>
	        <?php endif; ?>
	        <?php if($result->Urine == '1'): ?>
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="urine" checked id="<?php echo e($result->Urine); ?>" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px">Urine</td>
	            </tr>
	        <?php endif; ?>
	        <?php if($result->Sputum == '1'): ?>
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="sputum" checked id="{$result->Sputum}}" style="font-size: 17.5pt !important;"/>
	                </td>
	                <td style="padding-left:20px"> Sputum </td>
	            </tr>
	        <?php endif; ?>
	        <?php if($result->OtherSample == '1'): ?>
	            <tr>
	                <td class="checkbox">
	                    <input type="checkbox" name="othersample" checked id="othersample" style="font-size: 17.5pt !important;" />
	                </td>
	                <td style="padding-left:20px">Other</td>
	            </tr>
	            <?php endif; ?>
	    </table>
	    <?php if($result->OtherSample == '1'): ?>
        <table>
            <tr class="othersamplespecify">
                <td style="font-family: elite !important;">Other(Specify):</td>
                <td style="padding-left:20px;">
                    <?php echo e($result->OtherSampleSpecify); ?>

                </td>
            </tr>
        </table>
        <?php endif; ?>
		
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table style="width:100%;">
			<?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th style="font-family: elite !important;">Ordered By:</th><td><?php echo e($req->rprovider->FirstName.' '. $req->rprovider->LastName); ?></td>
				<?php
                    $otime = explode(" ",$req->created_at)
                ?>
				<th >Date:</th><td><?php echo e($otime[0]); ?></td>
				<th >Time:</th><td><?php echo e($otime[1]); ?></td>

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php $__currentLoopData = $samplecollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
				<th >Collected By:</th><td><?php echo e($sample->lscprovider->FirstName.' '. $sample->lscprovider->LastName); ?></td>
				<?php
                    $ctime = explode(" ",$sample->created_at)
                ?>
				<th >Date:</th><td><?php echo e($ctime[0]); ?></td>
				<th >Time:</th><td><?php echo e($ctime[1]); ?></td>

			</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
				<th >Tested By:</td><td><?php echo e($result->grprovider->FirstName.' '. $result->grprovider->LastName); ?></td>
				<?php
                    $ttime = explode(" ",$result->created_at)
                ?>
				<th >Date:</th><td><?php echo e($ttime[0]); ?></td>
				<th >Time:</th><td><?php echo e($ttime[1]); ?></td>

			</tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<table style="width:100%;">
			<tr><th >Hemoglobin:</th><td><?php echo e($result->HemoglobinResults); ?></td></tr>
            <tr><th >Peripheral Smear:</th><td><?php echo e($result->PeripheralSmearResults); ?></td></tr>
            <tr><th >Syphillis:</th><td><?php if($result->SyphillisResults != null): ?>  <?php echo e($posneg[$result->SyphillisResults]); ?> <?php endif; ?></td></tr>
            <tr><th >RPR:</th><td><?php if($result->RPR != null): ?> <?php echo e($prpresult[$result->RPR]); ?> <?php endif; ?></td></tr>
            <tr><th >Blood Glucose:</th><td><?php echo e($result->BloodGlucoseResults); ?></td></tr>
            <tr><th >Blood Smear, Parasites:</th><td><?php if($result->ParasitesSeen != null): ?><?php echo e($posneg[$result->ParasitesSeen]); ?> <?php endif; ?></td>
            	<td>
            		<th>Quantity</th><td><?php if($result->ParasiteQuantity != null): ?> <?php echo e($quantity[$result->ParasiteQuantity]); ?> <?php endif; ?></td>
            		<th>Species</th><td>
            			<?php if($result->BloodSmearParasiteSpecies != null): ?>
            				<?php echo e($parasitespecies[$result->BloodSmearParasiteSpecies]); ?>

            			<?php endif; ?>
            			</td>
            	</td>
            </tr>
            <tr><th >Smear Slide Comments</th><td><?php echo e($result->BloodSmearResultComments); ?></td></tr>
		</table>
		<div style="border-bottom:dotted 1px;margin:10px 0px;"></div>
		<div>
			<div style="width:32%; display: inline-block;vertical-align: top">
				<table style="width:100%;">
					<tr style="background: #d6d6d6"><th colspan="2" style="text-align:center;">Urine Dipstick</th></tr>
					<tr><th >Color:</th><td><?php if($result->UrineColor != null): ?> <?php echo e($urinecolor[$result->UrineColor]); ?> <?php endif; ?></td></tr>
		            <tr><th >Clarity:</th><td><?php if($result->UrineClarity != null): ?> <?php echo e($urineclarity[$result->UrineClarity]); ?> <?php endif; ?></td></tr>
		            <tr><th >Sp.Gr:</th><td><?php if($result->UrineSpecificGravity != null): ?> <?php echo e($urinegrav[$result->UrineSpecificGravity]); ?> <?php endif; ?></td></tr>
		            <tr><th >PH:</th><td><?php echo e($result->UrinePH); ?></td></tr>
		            <tr><th >Nitrites:</th><td><?php if($result->UrineNitrites != null): ?> <?php echo e($posneg[$result->UrineNitrites]); ?> <?php endif; ?></td></tr>
		            <tr><th >Protein:</th><td><?php if($result->UrineProtein != null): ?> <?php echo e($urineprotein[$result->UrineProtein]); ?> <?php endif; ?></td></tr>
		            <tr><th >Glucose:</th><td><?php if($result->UrineGlucose != null): ?> <?php echo e($urineglucose[$result->UrineGlucose]); ?> <?php endif; ?></td></tr>
		            <tr><th >Ketones:</th><td><?php if($result->UrineKetones != null): ?> <?php echo e($urineleuko[$result->UrineKetones]); ?> <?php endif; ?></td></tr>
		            <tr><th >Urobil:</th><td><?php if($result->UrineUrobil != null): ?> <?php echo e($urineurobil[$result->UrineUrobil]); ?> <?php endif; ?></td></tr>
		            <tr><th >Biliruin:</th><td><?php if($result->UrineBilirubin != null): ?> <?php echo e($urineurobil[$result->UrineBilirubin]); ?> <?php endif; ?></td></tr>
		            <tr><th >Blood:</th><td><?php if($result->UrineBlood != null): ?> <?php echo e($urineblood[$result->UrineBlood]); ?> <?php endif; ?></td></tr>
		            <tr><th >Leukocytes:</th><td><?php if($result->UrineLeuk != null): ?> <?php echo e($urineleuko[$result->UrineLeuk]); ?> <?php endif; ?></td></tr>
				</table>
			</div>
			<div style="width:32%;display: inline-block; vertical-align: top">
				<table style="width:100%">
					<tr style="background: #d6d6d6;"><th colspan="2" style="text-align:center;">Urine Miscroscopic</th></tr>
					<tr><th >WBCs:</td><td><?php echo e($result->UrineWBCs); ?></td></tr>
				    <tr><th >RBCs</td><td><?php echo e($result->UrineRBCs); ?></td></tr>
				    <tr><th >Epis</th><td><?php echo e($result->UrineEpis); ?></td></tr>
				    <tr><th >Casts:</th><td><?php echo e($result->UrineCasts); ?></td></tr>
				    <tr><th >Crystals:</th><td><?php echo e($result->UrineCrystals); ?></td></tr>
				    <tr><th >Yeast:</th><td><?php echo e($result->UrineYeast); ?></td></tr>
				    <tr><th >Org:</th><td><?php echo e($result->UrineOrg); ?></th></tr>
				    <tr><th >Urine Pregnancy Results:</th><td><?php if($result->UrinePregnancy != null): ?> <?php echo e($posneg[$result->UrinePregnancy]); ?>

                        <?php endif; ?></td></tr>
			    </table>
			</div>
			<div style="width:33%;display: inline-block;vertical-align: top">
				<table style="width:100%;">
					<tr style="background: #d6d6d6"><th colspan="2" style="text-align:center;">Stool, Direct Exam</th></tr>
					<tr><th >Form:</th><td><?php if($result->StoolForm != null): ?> <?php echo e($stool[$result->StoolForm]); ?> <?php endif; ?></td></tr>
				    <tr><th >Parasites Seen:</th><td><?php if($result->StoolParasitesSeen != null): ?> <?php echo e($yesno[$result->StoolParasitesSeen]); ?> <?php endif; ?></td></tr>
				    <tr><th >Parasites(genus species):</th><td><?php echo e($result->StoolParasiteSpecies); ?></td></tr>
				    <tr><th >WBCs:</th><td><?php echo e($result->StoolWBCs); ?></td></tr>
				    <tr><th >Yeast:</th><td><?php echo e($result->StoolYeast); ?></td></tr>
				    <tr><th  >Gram Stain:</th></tr>
				    <tr><th >Source:</th><td><?php if($result->GramStainSource != null): ?> <?php echo e($stainsource[$result->GramStainSource]); ?> <?php endif; ?></td></tr>
				    <tr><th >Organisms Seen:</th><td><?php if($result->GramStainOrganismsSeen != null): ?> <?php echo e($yesno[$result->GramStainOrganismsSeen]); ?> <?php endif; ?></td></tr>
				    <tr><th >Organisms:</th><td><?php echo e($result->GramStainOrganisms); ?></td></tr>
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
					<?php if($result->AFBSmearLymph != null): ?>
						<?php echo e($yesno[$result->AFBSmearLymph]); ?>

					<?php endif; ?>
				</td>
					
				<th align="left">AFB Smear(Direct) Sputum</th>
				<td>
					<?php if($result->AFBSmearSputum != null): ?>
						<?php echo e($yesno[$result->AFBSmearSputum]); ?>

					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th align="left">AFB Seen</th>
				<td>
					<?php if($result->AFBSmearLymph != null): ?>
						<?php echo e($yesno[$result->AFBSmearLymph]); ?>

					<?php endif; ?>
				</td>
				<th align="left">AFB Seen</th>
				<td>
					<?php if($result->AFBSmearSputum != null): ?>
						<?php echo e($yesno[$result->AFBSmearSputum]); ?>

					<?php endif; ?>
				</td>
			</tr>
            
		</table>
		<div class="footer" style="margin-right: 5px;position:fixed; bottom:60px; right:60px;">
	        <div style="font-size: 10px !important; text-align: right;">Powered by OpenICEA</div>
	    </div>	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/printresults.blade.php ENDPATH**/ ?>