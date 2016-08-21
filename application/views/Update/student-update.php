<div class="container body-student">
	<div class="row">
		<div class="col-sm-12">
		<form id="student-form" action="<?php echo $_server?>editStudentProf.do?" method="POST" id="editStudentProf-form" enctype="multipart/form-data">
			<input type="hidden" name="lang" value="<?=$lang?>">
			<input type="hidden" name="redirectUrl" value="<?php echo base_url(); ?>update/student">
			<h2 style="color:#0596D5 ;" ><?php echo lang('STUDENT_MENU_PROFILE_UPDATE');?></h2>
			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo lang('FORM_MAIN');?></h3>
					<hr>
				</div>
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_PREFIX');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="prefixName" readonly>
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_NAME');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="firstname" readonly>
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_SURNAME');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="lastname" readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_PERSONAL_ID');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="peopleId" readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_GENDER');?> :</label>
							<div class="col-sm-8">
								<input type="hidden" class="form-control" name="genderId" readonly>
								<input type="text" class="form-control" id="gender" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_MILITARY');?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="militaryStatus" readonly>
							</div>
						</div>
						
						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right ">สถานะ :</label>
							<div class="col-sm-8"><input type="text" class="form-control hidden" name="โสด" ></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_NATIONALITY');?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nationality">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_RELIGION');?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="religion">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_WEIGHTS')?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="weight">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_HEIGHT');?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="tall">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo lang('FORM_MAIN_WORK');?></h3>
					<hr>
				</div>
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_INTERESTED_WORK');?> 1 :</label>
							<div class="col-sm-8">
								<select class="form-control" name="intJob1"id="interestedJob1">
									<option value="-1"><?php echo lang('NOT_SELECTED');?></option>
									<?php
										foreach ($Interesting as $Interestings) {
											echo '<option value="'. $Interestings->intJobId .'">' . $Interestings->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_INTERESTED_WORK');?> 2 :</label>
							<div class="col-sm-8">
								<select class="form-control" name="intJob2"id="interestedJob2">
									<option value="-1"><?php echo lang('NOT_SELECTED');?></option>
									<?php
										foreach ($Interesting as $Interestings) {
											echo '<option value="'. $Interestings->intJobId .'">' . $Interestings->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_INTERESTED_WORK');?> 3 :</label>
							<div class="col-sm-8">
								<select class="form-control" name="intJob3"id="interestedJob3">
									<option value="-1"><?php echo lang('NOT_SELECTED');?></option>
									<?php
										foreach ($Interesting as $Interestings) {
											echo '<option value="'. $Interestings->intJobId .'">' . $Interestings->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMPLOYMENT_TYPE');?> :</label>
							<div class="col-sm-8">
								<?php foreach ($JobType as $JobTypes){
									?>
									<div class="checkbox inline-block">
									    <label>
									      	<input type="checkbox" id="jobTypeId<?php echo $JobTypes->jobTypeId; ?>" name="jobTypeId" value="<?php echo $JobTypes->jobTypeId; ?>"> <?php echo $JobTypes->name; ?>
									    </label>
							  		</div>
									<?php
								}
								?>
							</div>
						</div>
						
						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right">ตำแหน่งที่สนใจ :</label>
							<div class="col-sm-8">
								<select class="form-control">
									<option>-- เลือก --</option>
									<option>-- ตำแหน่งที่สนใจ 1 --</option>
									<option>-- ตำแหน่งที่สนใจ 2 --</option>
									<option>-- ตำแหน่งที่สนใจ 3 --</option>
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SALARY');?> :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="prefIncome" id="preferedIncome">
							</div>
						</div>						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo lang('FORM_MAIN_PERMANENT_ADDRESS');?></h3>
					<hr>
				</div>
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADDRESS');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="homeId" readonly>
							</div>
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_MOO');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="moo" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SOI');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="soi" readonly>
							</div>
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_STREET');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="street" readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PROVINCE');?> :</label>
							<div class="col-sm-8 s2-radius">
								<select class="form-control select2" id="provinceId" disabled>									
									<?php
										foreach ($Province as $Provinces) {
											echo '<option value="'. $Provinces->provinceId .'">' . $Provinces->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DISTRICT');?> :</label>
							<div class="col-sm-8 s2-radius">
								<select class="form-control select2" id="districtId" disabled>
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
								<div id="districtId-error" class="text-red"></div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SUB_DISTRICT');?>  :</label>
							<div class="col-sm-8 s2-radius">
								<select class="form-control select2" id="subDistrictId" disabled>
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
								<div id="subDistrictId-error" class="text-red"></div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ZIPCODE');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" id="zipcode" readonly></div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo lang('FORM_MAIN_CONTACT');?></h3>
					<hr>
				</div>
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADDRESS');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="homeIdCurr" name="homeId">
							</div>
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_MOO');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="mooCurr"name="moo">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SOI');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="soiCurr" name="soi">
							</div>
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_STREET');?> :</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" rows="3" id="streetCurr" name="street">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PROVINCE');?> :</label>
							<div class="col-sm-8 s2-radius provinceIdCurr">
								<select class="form-control select2" name="provinceId" id="provinceIdCurr">
									<?php
										foreach ($Province as $Provinces) {
											echo '<option value="'. $Provinces->provinceId .'">' . $Provinces->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DISTRICT');?> :</label>
							<div class="col-sm-8 s2-radius districtIdCurr">
								<select class="form-control select2" name="districtId" id="districtIdCurr">
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
								<div id="districtId-error" class="text-red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_SUB_DISTRICT');?>  :
							</label>
							<div class="col-sm-8 s2-radius">
								<select class="form-control select2" id="subDistrictIdCurr" name="subDistrictId">
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
								<div id="subDistrictId-error" class="text-red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_ZIPCODE');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="zipcodeCurr" name="zipcode">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="email"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="tel"></div>
						</div>

						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right">Facebook:</label>
							<div class="col-sm-8"><input type="text" class="form-control" name=""></div>
						</div>

						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right">Line ID:</label>
							<div class="col-sm-8"><input type="text" class="form-control" name=""></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo lang('FORM_MAIN_EDUCATION');?></h3>
					<hr>
				</div>
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_STUDENT_ID');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="studentId" readonly></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_END_YEAR');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="endYear" readonly></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_GRADE');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="grade" readonly></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_MAJOR');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="subjectType" readonly></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_COLLEGE');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="subjectName" readonly></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_BRANCH');?> :
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="workBranch" readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_GPA');?> :</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="3.41" readonly></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="padding-bottom: 20px;">
				<div class="col-sm-12">
					<button class="btn-blue btn center-block pull-right" style="margin-top: 15px;"><?php echo lang('BTN_SAVE');?></button>
					<a href="<?php echo site_url('auth/logout')?>">
						<span class="btn-gray btn center-block pull-right" style="margin-top: 15px;margin-right: 15px;">กลับสู่หน้าหลัก</span>
					</a>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<script>
	$( document ).ready(function() {
		$('#coppyAddress').click(function(event) {
			coppyAddress();
		});
		LoadingPage();
		$('.input-file').filestyle({
			buttonName : 'btn-info  btn'
		});

		$("#student-form").validate({
			rules: {
				intJob1: {
					maxlength: 1024
				},
				intJob2: {
					maxlength: 1024
				},
				intJob3: {
					maxlength: 1024
				},
				prefIncome:{
					number: true,
					maxlength: 16
				},
				homeId:{
					maxlength: 50
				},
				moo:{
					maxlength: 256
				},
				soi:{
					maxlength: 256
				},
				street:{
					maxlength: 256
				},
				zipcode:{
					number: true,
					maxlength: 5,
					minlength: 5
				},
				email:{
					email: true,
					maxlength: 512
				},
				tel:{
					number: true,
					maxlength: 50
				},
				resume:{
					extension: "pdf"
				},
				transcript:{
					extension: "pdf"
				}

			}
		});

		var user_id = '<?php echo $this->session->userdata['user_id'];?>';
		var parameters ={
			token: btoa(user_id),
			userId: user_id
		}
		$(".provinceIdCurr").click(function(event) {
			$("select[name='provinceId']").change(function(event) {
				paramChange ={
					provinceIdCurr :$("#provinceIdCurr").val(),
					districtIdCurr :'-1',
					subDistrictIdCurr :'-1',
					_server : '<?php echo $_server?>',
				}
				changedistrictIds(paramChange);
			});
		});
		$(".districtIdCurr").click(function(event) {
			$("select[name='districtId']").change(function(event) {
				paramChange ={
					provinceIdCurr :$("#provinceIdCurr").val(),
					districtIdCurr :$("#districtIdCurr").val(),
					subDistrictIdCurr :'-1',
					_server : '<?php echo $_server?>',
				}
				changesubDistrictIds(paramChange);
			});
		});

		var getStudentDetail = '<?php echo $_server?>getStudentDetail.do?';
		var api = $.post(getStudentDetail,parameters);
		api.done(function( data ) {
			if(data.responseCode != 200){
				window.location = '<?php echo site_url();?>auth/logout';
			}
			var StudentDetail = data.data;
			//Add value
				$("#prefixName").html(StudentDetail.prefixName);
				$("#firstname").html(StudentDetail.firstname);
				$("#lastname").html(StudentDetail.lastname);
				$( "input[name ='prefixName']" ).val( StudentDetail.prefixName);
				$( "input[name ='firstname']" ).val( StudentDetail.firstname);
				$( "input[name ='lastname']" ).val( StudentDetail.lastname);
				$( "input[name ='peopleId']" ).val( StudentDetail.peopleId);
				$( "input[name ='genderId']" ).val( StudentDetail.genderId);
				$( "#gender" ).val( (StudentDetail.genderId ==1)? '<?php echo lang('GENDER_MAN') ?>':'<?php echo lang('GENDER_WOMAN') ?>');
				$( "input[name ='nationality']" ).val( StudentDetail.nationality);
				$( "input[name ='religion']" ).val( StudentDetail.religion);
				$( "input[name ='weight']" ).val( StudentDetail.weight);
				$( "input[name ='tall']" ).val( StudentDetail.tall);
				$( "input[name ='militaryStatus']" ).val( StudentDetail.militaryStatus);
				$( "#homeId" ).val( StudentDetail.homeId);
				$( "#moo" ).val( StudentDetail.moo);
				$( "#soi" ).val( StudentDetail.soi);
				$( "#street" ).val( StudentDetail.street);
				$( "input[name ='email']" ).val( StudentDetail.email);
				$( "input[name ='tel']" ).val( StudentDetail.tel);
				$( "#zipcode" ).val( StudentDetail.zipcode);
				$( "#streetCurr" ).val( StudentDetail.streetCurr);
				$( "#mooCurr" ).val( StudentDetail.mooCurr);
				$( "#zipcodeCurr" ).val( StudentDetail.zipcodeCurr);
				$( "#homeIdCurr" ).val( StudentDetail.homeIdCurr);
				$( "#soiCurr" ).val( StudentDetail.soiCurr);
				$( "#gpa" ).val( StudentDetail.gpa);
				$( "#preferedIncome" ).val( StudentDetail.preferedIncome);
				$( "#interestedJob1" ).val( StudentDetail.interestedJob1);
				$( "#interestedJob2" ).val( StudentDetail.interestedJob2);
				$( "#interestedJob3" ).val( StudentDetail.interestedJob3);
				JobTypes = StudentDetail.studentRequiredJobTypes;
				for (var i = 0; i < JobTypes.length ; i++) {
					jobTypeId = JobTypes[i]['id'].jobTypeId;
					$('#jobTypeId'+jobTypeId).attr('checked', 'checked');
				}
			// Add value
			$( "#provinceId" ).select2("val", StudentDetail.provinceId);
			$("#provinceIdCurr").select2("val", StudentDetail.provinceIdCurr);
			paramChange ={
				provinceId : StudentDetail.provinceId,
				districtId : StudentDetail.districtId,
				subDistrictId : StudentDetail.subDistrictId,
				provinceIdCurr:StudentDetail.provinceIdCurr,
				districtIdCurr:StudentDetail.districtIdCurr,
				subDistrictIdCurr:StudentDetail.subDistrictIdCurr,
				_server : '<?php echo $_server ?>',
				ONLOAD : '<?php echo lang('ONLOAD') ?>',
				SELECT_NONE :'<?php echo lang('SELECT_NONE');?>',
			}
			changedistrictIds(paramChange);
			var parameter = {
				peopleId:StudentDetail.peopleId,
				onlyTop:'y',
				lang:'<?=$lang?>'
			};
			var edu = $.post('<?php echo $_server?>getStudentProfileDetail.do',parameter);
			edu.done(function( data ) {
				if(data.responseCode == 200){
					var eduProfile = data.data[0];
					$( "input[name ='studentId']" ).val( eduProfile.studentId);
					$( "input[name ='endYear']" ).val( eduProfile.endYear);
					$( "input[name ='grade']" ).val( eduProfile.grade);
					$( "input[name ='subjectType']" ).val( eduProfile.subjectType);
					$( "input[name ='subjectName']" ).val( eduProfile.subjectName);
					$( "input[name ='workBranch']" ).val( eduProfile.workBranch);
					$( "input[name ='gpa']" ).val( eduProfile.gpa);
				}
			});
			UnLoadingPage();
		});
	});

	function coppyAddress() {
		homeId = $('#homeId').val();
		moo = $('#moo').val();
		soi = $('#soi').val();
		street = $('#street').val();
		zipcode = $('#zipcode').val();
		provinceId = $('#provinceId').val();
		districtId = $('#districtId').val();
		subDistrictId = $('#subDistrictId').val();

		$('#homeIdCurr').val(homeId);
		$('#mooCurr').val(moo);
		$('#soiCurr').val(soi);
		$('#streetCurr').val(street);
		$('#zipcodeCurr').val(zipcode);
		$('#provinceIdCurr').select2("val",provinceId);
		paramChange ={
			provinceIdCurr : provinceId,
			districtIdCurr : districtId,
			subDistrictIdCurr : subDistrictId,
			_server : '<?php echo $_server ?>',
			type : 'Curr',
			ONLOAD : '<?php echo lang('ONLOAD') ?>',
			SELECT_NONE :'<?php echo lang('SELECT_NONE');?>'
		}
		changedistrictIds(paramChange);
	}
</script>