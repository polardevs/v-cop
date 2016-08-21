<?php echo css_asset("company-style.css", "common"); ?>
<?php echo css_asset("print.css", "common"); ?>
<div class="container-body">
<?php 
	$roleId= isset($userdata['user_role_id'])? $userdata['user_role_id']:'';
	if(isset($StudentDetail) && $StudentDetail->responseCode ==200){
		$StudentDetails = $StudentDetail->data; ?>
		<div class="container visible-print">
			<!--<h3 class="text-center">ข้อมูลนักศึกษา</h3>-->
			<table>
				<tr>
					<td class="title">
						<h6><?php echo lang('STUDENT_INFO');?></h6>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td width="80%" colspan="2">
						<b><?php echo lang('FORM_NAME'); ?> :</b>
						<?php echo $StudentDetails->prefixName;?> 
						<?php echo $StudentDetails->firstname;?>
						<?php echo $StudentDetails->lastname;?>
					</td>
					<td rowspan="3" colspan="1" width="20%" class="text-center" style="padding-top: 10px;">
						<img src="<?php echo $StudentDetails->avatarFilePath;?>" style="max-width: 70%; max-height: 120px;" >
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<b><?php echo lang('STUDENT_NO'); ?> :</b>
						<?php echo sprintf("%06s", $userId); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b><?php echo lang('FORM_GENDER'); ?> :</b>
						<?php echo ($StudentDetails->genderId == 1)? lang('GENDER_MAN') : lang('GENDER_WOMAN'); ?>
					</td>
				</tr>
				<tr>
					<td colspan="3" >
						<b><?php echo lang('FORM_ADDRESS'); ?> :</b>
						<?php echo $StudentDetails->homeCurr;?> 
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td width="50%">
						<b><?php echo lang('FORM_EMAIL'); ?> :</b>
						<?php echo $StudentDetails->email;?> 
					</td>
					<td width="50%">
						<b><?php echo lang('FORM_TEL'); ?> :</b>
						<?php echo $StudentDetails->tel;?> 
					</td>
				</tr>
				<tr>
					<td width="50%">
						<b><?php echo lang('FORM_BIRTHDAY'); ?> :</b>
						<?php echo $StudentDetails->birthdate;?> 
					</td>
					<td width="50%">
						<b><?php echo lang('FORM_AGE'); ?> :</b>
						<?php echo (date("Y") + 543) - $StudentDetails->birthYear;?>
					</td>
				</tr>

				<tr>
					<td width="50%">
						<b><?php echo lang('FORM_HEIGHT'); ?> :</b>
						<?php echo $StudentDetails->tall;?>

					</td>
					<td width="50%">
						<b><?php echo lang('FORM_WEIGHT'); ?> :</b>
						<?php echo $StudentDetails->weight;?>
					</td>
				</tr>

				<tr>
					<td width="50%">
						<b><?php echo lang('FORM_NATIONALITY'); ?> :</b>
						<?php echo $StudentDetails->nationality;?>

					</td>
					<td width="50%">
						<b><?php echo lang('FORM_RELIGION'); ?> :</b>
						<?php echo $StudentDetails->religion;?>
					</td>
				</tr>

				<tr>
					<td width="50%">
						<b><?php echo lang('FORM_STATUS'); ?> :</b>
						<?php echo $StudentDetails->maritalStatus;?>

					</td>
					<td width="50%">
						<?php 
							if($StudentDetails->genderId == 1) {
								echo '<b>'.lang('FORM_MILITARY').": </b>";
								echo $StudentDetails->militaryStatus;
						}
						?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b>สถานะความพิการ :</b>
						<?php echo $StudentDetails->cripple;?>
					</td>
				</tr>
				
			</table>

			<table>
				<tr>
					<td class="title">
						<h6><?php echo lang('FORM_MAIN_JOB');?></h6>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td width="30%">
						<b><?php echo lang('FORM_INTERESTED_WORK'); ?> :</b>
					</td>
					<td>
						1. <?php echo $StudentDetails->intJobName1 ;?><br>
						2. <?php echo $StudentDetails->intJobName2 ;?><br>
						3. <?php echo $StudentDetails->intJobName3 ;?>
					</td>
				</tr>
				<tr>
					<td width="30%">
						<b><?php echo lang('FORM_SALARY'); ?> :</b>
					</td>
					<td>
						<?php echo number_format($StudentDetails->preferedIncome, 0, '', ','); ?>
					</td>
				</tr>
				<tr>
					<td width="30%">
						<b><?php echo lang('FORM_JOB_LOCATION'); ?> :</b>
					</td>
					<td>
						<?php echo number_format($StudentDetails->preferedIncome, 0, '', ','); ?>
					</td>
				</tr>
				<tr>
					<td width="30%">
						<b><?php echo lang('FORM_EMPLOYMENT_TYPE'); ?> :</b>
					</td>
					<td>
						<?php
							$JobTypesName ="";
							foreach ($StudentDetails->studentRequiredJobTypes as $JobTypesid) {
								foreach ($JobType as $JobTypes)
								if($JobTypesid->id->jobTypeId == $JobTypes->jobTypeId){
									$JobTypesName .= $JobTypes->name ." , ";
								}
							}
							echo (substr($JobTypesName, 0, (strlen($JobTypesName)-2))) ;
						?>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td class="title">
						<h6><?php echo lang('FORM_MAIN_EDUCATION');?></h6>
					</td>
				</tr>
			</table>
			<?php foreach ($StudentProfile->data as $StudentProfiles) { ?>
				<table class="border-item">
					<tr>
						<td colspan="4"> 
							<?php echo $StudentProfiles->schoolName ;?>
							<?php echo $StudentProfiles->grade;?>
							(<?php echo $StudentProfiles->semester."/".$StudentProfiles->year;?>)
						</td>
					</tr>
					<tr>
						<td width="10%"> 
							<b><?php echo lang('FORM_COLLEGE'); ?></b>
						</td>
						<td width="40%">
							<?php echo $StudentProfiles->subjectName;?>
						</td>
						<td width="10%"> 
							<b><?php echo lang('FORM_MAJOR'); ?></b>
						</td>
						<td width="40%">
							<?php echo $StudentProfiles->subjectType;?>
						</td>
					</tr>

					<tr>
						<td width="10%"> 
							<b><?php echo lang('FORM_BRANCH'); ?></b>
						</td>
						<td width="40%">
							<?php echo (isset($StudentProfiles->workBranch))? $StudentProfiles->workBranch : '';?>
						</td>
						<td width="10%"> 
							<b><?php echo lang('FORM_GPA'); ?></b>
						</td>
						<td width="40%">
							<?php echo $StudentProfiles->gpa;?>
						</td>
					</tr>
				</table>
			<?php }	?>

			<table>
				<tr>
					<td class="title">
						<h6><?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?></h6>
					</td>
				</tr>
			</table>

			<?php foreach ($UserEmployedHistory->data as $key => $UserEmployedHistorys){ ?>
				<table class="border-item">
					<tr>
						<td colspan="4"> 
							<?php echo $UserEmployedHistorys->companyName ?>
							(<?php echo DateThaiShort($UserEmployedHistorys->startDate); ?> - <?php echo DateThaiShort($UserEmployedHistorys->endDate);?>)
						</td>
					</tr>
					<tr>
						<td width="15%"> 
							<b><?php echo lang('FORM_POSITION'); ?></b>
						</td>
						<td width="85%">
							<?php echo $UserEmployedHistorys->jobTitle ?>
						</td>
					</tr>
					<tr>
						<td width="15%"> 
							<b><?php echo lang('MAIN_JOB_DUTY'); ?></b>
						</td>
						<td width="85%">
							<?php echo $UserEmployedHistorys->detail ?>
						</td>
					</tr>

					<tr>
						<td width="15%"> 
							<b><?php echo lang('MAIN_JOB_SALARY'); ?></b>
						</td>
						<td width="85%">
							<?php echo number_format($UserEmployedHistorys->salary, 0, '', ','); ?>
						</td>
					</tr>
				</table>
			<?php }	?>

			<table>
				<tr>
					<td class="title">
						<h6><?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?></h6>
					</td>
				</tr>
			</table>
			<?php foreach ($Portfolio->data as $Portfolios){ 
				if($Portfolios->point != 0){ ?>
					<table class="border-item">
						<tr>
							<td colspan="2"> 
								<?php echo $Portfolios->title .' ('.DateThaiShort($Portfolios->modifiedDate).')' ?>
							</td>
						</tr>
						<tr>
							<td width="15%"> 
								<b><?php echo lang('MAIN_JOB_RANK'); ?></b>
							</td>
							<td width="85%"> 
								<?php
								    if($Portfolios->portTypeId == 99){
								        echo $Portfolios->portLevel;
								    }else{
								        echo $Portfolios->portTypeName;
								    }
								?>
							</td>
						</tr>
						<tr>
							<td width="15%"> 
								<b><?php echo lang('FORM_PORT_DESC'); ?></b>
							</td>
							<td width="85%"> 
								<?php echo $Portfolios->detail ?>
							</td>
						</tr>
					</table>
				<?php }
				}
			?>
		</div>
		<div class="container body-showresume hidden-print">
			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<div class="row">
							<div class="col-sm-6">
								<h3><?php echo lang('STUDENT_NO');?> : <span><?php echo sprintf("%06s", $userId); ?></span></h3>
							</div>
							<div class="col-sm-6 text-right">
								<h3><?php echo lang('FORM_LAST_UPDATE');?> : <span><?php echo DateThai($StudentDetails->updatedDate); ?></span></h3>
							</div>
						</div>
					</div>
					
					<div class="box-content form-horizontal">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_NAME'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->prefixName;?> <?php echo $StudentDetails->firstname;?></p>
									</div>
									<label class="col-sm-1 control-label"><?php echo lang('FORM_SURNAME'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->lastname;?></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_ADDRESS'); ?> </label>
									<div class="col-sm-7">
										<p class="form-control-static"><?php echo $StudentDetails->homeCurr;?></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_EMAIL'); ?> </label>
									<div class="col-sm-6">
										<p class="form-control-static"><?php echo $StudentDetails->email;?></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_TEL'); ?> </label>
									<div class="col-sm-6">
										<p class="form-control-static"><?php echo $StudentDetails->tel;?></p>
									</div>
								</div>
								
							</div>
							<div class="col-sm-2 text-right">
								<img src="<?php echo $StudentDetails->avatarFilePath;?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<h3><?php echo lang('STUDENT_INFO');?></h3>
					</div>
					<div class="box-content form-horizontal">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_GENDER'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo ($StudentDetails->genderId == 1)? lang('GENDER_MAN') : lang('GENDER_WOMAN'); ?></p>
									</div>
									<?php if($StudentDetails->birthdate){?>
										<label class="col-sm-2 control-label"><?php echo lang('FORM_BIRTHDAY'); ?> </label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo $StudentDetails->birthdate;?></p>
										</div>
										
										<label class="col-sm-2 control-label"><?php echo lang('FORM_AGE'); ?> </label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo (date("Y") + 543) - $StudentDetails->birthYear;?></p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_HEIGHT'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->tall;?></p>
									</div>
									
									<label class="col-sm-2 control-label"><?php echo lang('FORM_WEIGHT'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->weight;?></p>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label"><?php echo lang('FORM_NATIONALITY'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->nationality;?></p>
									</div>
									
									<label class="col-sm-2 control-label"><?php echo lang('FORM_RELIGION'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->religion;?></p>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<?php if($StudentDetails->maritalStatus){?>
										<label class="col-sm-2 control-label"><?php echo lang('FORM_STATUS'); ?> </label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo $StudentDetails->maritalStatus;?></p>
										</div>
									<?php }?>
									<?php if($StudentDetails->genderId == 1){?>
										<label class="col-sm-2 control-label"><?php echo lang('FORM_MILITARY'); ?> </label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo $StudentDetails->militaryStatus;?></p>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label">สถานะความพิการ</label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo $StudentDetails->cripple;?></p>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<h3><?php echo lang('FORM_MAIN_JOB');?></h3>
					</div>
					<div class="box-content form-horizontal">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-3 control-label"><?php echo lang('FORM_INTERESTED_WORK'); ?> </label>
									<div class="col-sm-9">
										<div class="form-control-static">1. <?php echo $StudentDetails->intJobName1 ;?></div>
										<div class="form-control-static">2. <?php echo $StudentDetails->intJobName2 ;?></div>
										<div class="form-control-static">3. <?php echo $StudentDetails->intJobName3 ;?></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-3 control-label"><?php echo lang('FORM_SALARY'); ?> </label>
									<div class="col-sm-2">
										<p class="form-control-static"><?php echo number_format($StudentDetails->preferedIncome, 0, '', ','); ?></dpiv>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-3 control-label"><?php echo lang('FORM_EMPLOYMENT_TYPE'); ?> </label>
									<div class="col-sm-9">
										<p class="form-control-static">
											<?php
												$JobTypesName ="";
												foreach ($StudentDetails->studentRequiredJobTypes as $JobTypesid) {
													foreach ($JobType as $JobTypes)
													if($JobTypesid->id->jobTypeId == $JobTypes->jobTypeId){
														$JobTypesName .= $JobTypes->name ." , ";
													}
												}
												echo (substr($JobTypesName, 0, (strlen($JobTypesName)-2))) ;
											?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<h3><?php echo lang('FORM_MAIN_EDUCATION');?> </h3>
					</div>
					<div class="box-content form-horizontal">
						<?php 	
							foreach ($StudentProfile->data as $StudentProfiles) {
							?>
								<div class="row">
									<div class="col-sm-10">
										<div class="form-control-static">
											<?php echo $StudentProfiles->schoolName ;?>
										</div>
									</div>
									<div class="col-sm-2 text-right">
										<div class="form-control-static">
											<?php echo $StudentProfiles->semester ." / ". $StudentProfiles->year;?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-10">
											<label class="col-sm-3 control-label"><?php echo lang('FORM_GRADE'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static"><?php echo $StudentProfiles->grade;?></p>
											</div>
											
											<label class="col-sm-3 control-label"><?php echo lang('FORM_COLLEGE'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static"><?php echo $StudentProfiles->subjectName;?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-10">
											<label class="col-sm-3 control-label"><?php echo lang('FORM_MAJOR'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static"><?php echo $StudentProfiles->subjectType;?></p>
											</div>
											
											<label class="col-sm-3 control-label"><?php echo lang('FORM_BRANCH'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static"><?php echo (isset($StudentProfiles->workBranch))? $StudentProfiles->workBranch : '';?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-10">
											<label class="col-sm-3 control-label"><?php echo lang('FORM_GPA'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static">
													<?php echo $StudentProfiles->gpa;?>
												</p>
											</div>
											
											<!-- <label class="col-sm-3 control-label"><?php echo lang('FORM_TRANSCRIPT'); ?> </label>
											<div class="col-sm-3">
												<p class="form-control-static">
												
													<a href='<?php echo $StudentDetails->transcriptFilePath; ?>' target='_blank' ><?php echo lang('DOWNLOAD').' '.lang('FORM_TRANSCRIPT');?></a>
												
												</p>
											</div> -->
										</div>
									</div>
								</div>
							<?php
							}
						?>
						
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<h3><?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?> </h3>
					</div>
					<div class="box-content form-horizontal">
					
					<?php foreach ($UserEmployedHistory->data as $key => $UserEmployedHistorys): ?>
						<div class="row">
							<div class="col-sm-10">
								<div class="form-control-static"><?php echo $UserEmployedHistorys->companyName ?></div>
							</div>
							<div class="col-sm-2 text-right">
								<div class="form-control-static"><?php echo DateThaiShort($UserEmployedHistorys->startDate); ?> - <?php echo DateThaiShort($UserEmployedHistorys->endDate);?></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-3 control-label"><?php echo lang('FORM_POSITION'); ?> </label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $UserEmployedHistorys->jobTitle ?></p>
									</div>
									
									<label class="col-sm-3 control-label"><?php echo lang('MAIN_JOB_SALARY'); ?> </label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo number_format($UserEmployedHistorys->salary, 0, '', ','); ?></p>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-10">
									<label class="col-sm-3 control-label"><?php echo lang('MAIN_JOB_DUTY'); ?> </label>
									<div class="col-sm-9">
										<p class="form-control-static"><?php echo $UserEmployedHistorys->detail ?></p>
									</div>
								</div>
							</div>
						</div>
						
					<div class="underline"></div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="box-title">
						<h3><?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?> </h3>
					</div>
					<div class="box-content form-horizontal">
					<?php foreach ($Portfolio->data as $Portfolios): ?>
						<?php if($Portfolios->point != 0):?>
							<div class="row">
								<div class="col-sm-10">
									<div class="form-control-static"><?php echo $Portfolios->title ?></div>
								</div>
								<div class="col-sm-2 text-right">
									<div class="form-control-static"><?php echo DateThaiShort($Portfolios->modifiedDate); ?></div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-sm-10">
										<label class="col-sm-3 control-label">
											<?php echo lang('MAIN_JOB_RANK'); ?>
										</label>
										<div class="col-sm-9">
											<p class="form-control-static">
												<?php
												    if($Portfolios->portTypeId == 99){
												        echo $Portfolios->portLevel;
												    }else{
												        echo $Portfolios->portTypeName;
												    }
												?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">	
									<div class="col-sm-10">
										<label class="col-sm-3 control-label"><?php echo lang('FORM_PORT_DESC'); ?> </label>
										<div class="col-sm-9">
											<p class="form-control-static">
												<?php echo $Portfolios->detail ;?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="underline"></div>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="pull-right labelshowresume">
			<?php if(isset($userdata['user_role_id']) && $this->session->userdata['user_role_id'] == 4){?>
				<a href="<?php echo site_url();?>position/comapany-mail?userId=<?php echo $this->input->get('userId');?>">
					<span class="label label-default">
						<i class="fa fa-pencil-square-o"></i> ติดต่อ
					</span>
				</a>
				<span class="label label-default Fav" onclick="AddFav('<?php echo $StudentDetails->peopleId;?>','<?php echo $userdata['user_id'];?>');">
					<i class="fa fa-star"></i> บันทึกเข้าแฟ้ม
				</span>
			<?php } ?>
				<span class="label label-info" onclick="Print();"><i class="fa fa-print"></i> </span>
			</div>	
		</div>
	<?php
	}
	$token = $this->input->get('token');
	$studentUser = $this->input->get('userId');
	?>
</div>
<?php
	$user_id = (isset($userdata['user_id']))? $userdata['user_id'] : '';

?>
<script>
	$(document).ready(function() {
		var roleId= '<?php echo $roleId;?>';
		var userId ='<?php echo $user_id;?>';
		var token ='<?php echo $token ?>';
		var studentUser ='<?php echo $studentUser ?>';

		if(!roleId && !token ) {
			window.location = '<?php echo site_url() ;?>';
		}if(token){
			parameter = {
				userId:token,
				lang: '<?php echo $lang ;?>'
			}
			var getFavorite = $.post('<?php echo $_server?>userAuthen.do?',parameter);
			getFavorite.done(function( data ) {
				console.log(data);
				if (data.responseCode == 200) {
					var setsession = $.post("<?php echo site_url(); ?>auth/login", data );
					 setsession.done(function( session ){
						var sessions = $.parseJSON(session);
						url='<?php echo site_url() ?>showresume?userId='+studentUser;
						window.location.href = url;
					});
					
				}
				
			});
		}
		var parameter = {
			peopleId: '<?php echo $StudentDetails->peopleId;?>',
			lang: '<?php echo $lang ;?>',
			token: btoa(userId)
		}
		var getFavorite = $.post('<?php echo $_server?>checkFavoriteStudent.do?',parameter);
		getFavorite.done(function( data ) {
			if (data.responseCode == 200) {
				$('.Fav').html('<i class="fa fa-star p1"></i> <?php echo lang("FAVORITED") ?>');
			}
			
		});

	});

	function AddFav(peopleId,userId) {
		LoadingPage();
		var parameter = {
			peopleId: peopleId,
			lang: '<?php echo $lang ;?>',
			token: btoa(userId)

		}
		var api = $.post( '<?php echo $_server?>favoriteStudent.do',parameter);
		api.done(function( data ) {
			if (data.responseCode == 200){
				location.reload();
			}
		});
	}
</script>