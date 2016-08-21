<div class="container body-student">
	<div class="row">
		<div class="col-sm-3" style="border-right: 2px solid #ccc">
			<div class="bg-info hidden-xs">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9">
			<div class="bg-gray">
				<h3><?php echo lang('STUDENT_MENU_PROFILE_UPDATE_STATUS');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div  class="circular">
						<img id="circular" class="center-block" src=""> 
					</div>
					<form id="avatar-form">
						<input type="file" id="input03" name="avatar">
					</form>
				</div>
				<div class="col-sm-9">
					<div class="row" style="min-height: 140px; padding-top: 20px;">
						<div class="col-sm-6">
							<p><?php echo lang('FORM_NAME_SURNAME');?> : <span id="name"></span></p> 
							<p><?php echo lang('FORM_PROVINCE');?> : <span id="province"></span></p> 
							<p><?php echo lang('FORM_GRADE');?> : <span id="level"></span></p>
						</div>
						<div class="col-sm-6">
							<p><?php echo lang('FORM_SCHOOL_NAME');?> : <span id="schoolName"></span></p> 
							<p><?php echo lang('FORM_COLLEGE');?> : <span id="subjectName"></span></p> 
							<p><?php echo lang('FORM_GPA');?> : <span id="gpa"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<a href="<?php echo site_url();?>showresume?userId=<?php echo $this->session->userdata['user_id'];?>" target="_blank">
								<button class="btn-gray btn center-block pull-right" style="margin-top: 15px;">
									<?php echo lang('BTN_VIEW_PROFILE');?>
								</button>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_LOGO') ?></small>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<h3>สถานะการหางาน</h3>
				</div>
				<?php
				if($StudentIntent){
					foreach ($StudentIntent as $StudentIntents){
					?>
						<div class="col-sm-3 radio inline-block" style="margin-top: 0;">
						  	<label>
							    <input type="radio" name="intentId" value="<?php echo $StudentIntents->intentId; ?>" >
							    <?php echo $StudentIntents->intentName; ?>
						  	</label>
						</div>
					<?php
					}
				}
				?>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<h3>ตำแหน่งงานปัจจุบัน</h3>
				</div>
				<div class="col-sm-12">
					<input type="radio" value="1" name="employedType" class="margin-r-10">จากเว็บไซต์ V-cop
					<input type="radio" value="2" name="employedType" class="margin-lr-10">จากแหล่งอื่น
				</div>
				<div class="form-group student-employed">
					<div class="col-sm-3">
						<label class="control-label text-right">
							<?php echo lang('FORM_POSITION');?> :
						</label>
						<input class="form-control" name="employedPosition"/>
					</div>
					<div class="col-sm-3">
						<label class="control-label text-right">
							<?php echo lang('MAIN_JOB_EMPLOYMENT_TYPE');?> :
						</label>
						<select class="form-control" name="employedJobTypeId">		
							<?php
								foreach ($JobType as $JobTypes) {
									echo '<option value="'. $JobTypes->jobTypeId .'">' . $JobTypes->name . '</option>';
								}
							?>											
						</select>
					</div>
					<div class="col-sm-6">
						<label class="control-label text-right">
							<?php echo lang('FORM_CROP_NAME');?> :
						</label>
						<select class="select2" style="width:100%" name ="employedCorpId">
							<?php 
							foreach ($Corp->items as $Corps) {
								echo "<option value='".$Corps->corpId."'>";
								echo $Corps->name;
								echo "</option>";
							}
							?>										
						</select>
						<input type="text" class="form-control" name="employedOuterCorpName" style="display: none">
					</div>
				</div>
				<div class="col-sm-6" style="position: absolute; bottom: 0px; color: #0596D5; padding-bottom: 20px;" >
					อัพเดทข้อมูลล่าสุด : <span class="updatedDate"></span>
				</div>
				<div class="col-sm-6 pull-right" style="padding-bottom: 20px;">
					<button class="btn-blue btn pull-right" id="updEmployment" style="margin-top: 15px;"><?php echo lang('BTN_UPDATE_WORK');?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$( document ).ready(function() {
		LoadingPage();
		var userId ='<?php echo $userdata['user_id'];?>';
		$('#input03').filestyle({
			input : false,
			buttonName : 'btn-gray btn',
			buttonText : "<?php echo lang('BTN_CHANGE_PROFILE') ;?>",
			icon : false,
			badge: false
		});

		$('input[name="employedType"]').change(function(event) {
			LoadingPage();
			checkEmployedType();
		});

		$('#updEmployment').click(function(event) {
			LoadingPage();
			param = {
				employedPosition:$('input[name="employedPosition"]').val(),
				employedJobTypeId: $('select[name="employedJobTypeId"]').val(),
				employedCorpId: $('select[name="employedCorpId"]').val(),
				employedOuterCorpName: $('input[name="employedOuterCorpName"]').val(),
				lang: '<?php echo $lang ;?>',
				token: btoa(userId)
			}
			var checked = $('input[name="employedType"]:checked').val();
			if(checked != 2){
				param.employedOuterCorpName = '';
			}
			var api = $.post( "<?php echo $_server?>updStudentEmployment.do",param);
			api.done(function( data ) {
				if(data.responseCode == 200) {
					alert('แก้ไขสำเร็จ');
				    location.reload();
				}else{
					alert('แก้ไขไม่สำเร็จ');
				    location.reload();
				}
			});
		});

		$( "input[name='intentId']" ).change( function( e ) {
			LoadingPage();
			var parameters = {
				intentId : $(this).val(),
				lang: "<?php echo $lang?>",
				token: btoa(userId)
			}
			var StudentIntent = $.post( "<?php echo $_server?>intentionUpdate.do", parameters);
			StudentIntent.done(function( data ) {
				UnLoadingPage();
			});
		});
		$( '#input03' ).change( function( e ) {
			LoadingPage();
		 	var data = new FormData();
		 	data.append('avatar', $('#input03')[0].files[0]);
		 	data.append('lang', '<?php echo $lang?>');
		 	data.append('token', btoa(userId));

		 	var sizeimg = $('#input03')[0].files[0].size;
		 	var typefile = $('#input03')[0].files[0].type;
		 	if(sizeimg >= 1000000){
		 		alert('ขนาดไฟล์ใหญ่กว่า 1 mb')
		 	}else if(typefile != 'image/png' && typefile != 'image/jpeg'){
		 		alert('โปรดเลือกไฟล์ที่นามสกุล .png , .jpg หรือ .jpeg เท่านั้น');
		 	}else{
				$.ajax({
				    url: "<?php echo $_server?>uploadUserAvatar.do",
				    data: data,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				    	alert('แก้ไขสำเร็จ');
				    	location.reload();
		    		}
				});
			}
			UnLoadingPage();
		});
		
		var getStudentDetail = '<?php echo $_server?>getStudentDetail.do';
		var api = $.post( getStudentDetail,{token: btoa(userId)});
		api.done(function( data ) {
			var StudentDetail = data.data;
			if(data.responseCode != 200){
				window.location = '<?php echo site_url();?>auth/logout';
			}
			$('#name').html(StudentDetail.firstname + " " + StudentDetail.lastname);
			$('#province').html(StudentDetail.province);
			avatarFilePath = '<?php echo base_url();?>assets/common/images/200px.png'
			if(StudentDetail.avatarFilePath){
				avatarFilePath = StudentDetail.avatarFilePath
			}
			$('#circular').attr("src", avatarFilePath)
			$('#circular-header').attr("src", StudentDetail.avatarFilePath)
			$( "input[name='intentId'][value='"+StudentDetail.intentId+"']" ).attr('checked', 'checked');
			$('input[name="employedPosition"]').val(StudentDetail.employedPosition);
			$('select[name="employedJobTypeId"]').val(StudentDetail.employedJobTypeId);
			$('.updatedDate').html(FormatDT(StudentDetail.stdUpdatedDate,'/'));
			if (StudentDetail.employedCorpId){
				$('input[name="employedType"][value="1"]').attr('checked', true);
				$('select[name="employedCorpId"]').val(StudentDetail.employedCorpId);
				$("select[name='employedCorpId']").select2();
			}if(StudentDetail.employedOuterCorpName) {
				$('input[name="employedType"][value="2"]').attr('checked', true);
				$('input[name="employedOuterCorpName"]').val(StudentDetail.employedOuterCorpName);
			}else{
				$('input[name="employedType"][value="1"]').attr('checked', true);
			}
			checkEmployedType();
			var getStudentProfileDetail = '<?php echo $_server?>getStudentProfileDetail.do';
			var sParam = {
				peopleId:StudentDetail.peopleId,
				onlyTop: 'y',
				lang:'<?php echo $lang; ?>'
			};
			var SProfileDetail = $.post( getStudentProfileDetail,sParam);
			SProfileDetail.done(function( data ) {
				if(data.responseCode == 200){
					var SProfile = data.data[0];
					$('#level').html(SProfile.grade);
					$('#schoolName').html(SProfile.schoolName);
					$('#subjectName').html(SProfile.subjectName);
					$('#gpa').html(SProfile.gpa);
				}
			});
			UnLoadingPage();
		});
	});

	function checkEmployedType(){
		var checked = $('input[name="employedType"]:checked').val();
		if(checked == 1){
			$('input[name="employedOuterCorpName"]').hide();
			$('.select2-container').show();
		}
		else if(checked == 2){
			$('input[name="employedOuterCorpName"]').show();
			$('.select2-container').hide();
		}
		UnLoadingPage();
	}
</script>