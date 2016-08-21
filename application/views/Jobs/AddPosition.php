<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/css/toggle-switch.css">
<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<form id="addPosition">
			<div class="row">
				<input type="hidden" name="jobId"/>
				<h2>
					<?php echo (isset($jobId))? lang('ADD_POSITION') : lang('ADD_POSITION') ;?>
				</h2>
				<hr>
				
				<h3 ondblclick="test();"><?php echo lang('ADD_POSITION_POSITION');?></h3>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_POSITION');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="position">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_COUNT');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="positionCount">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_SALARY');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="salary">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_DESCRIPTION');?> :</label>
						<div class="col-sm-8">
							<textarea name="detail" class="form-control" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_URGENT');?> :</label>
						<div class="col-sm-3">
							<div class="checkbox inline-block">
							    <label>
							      	<input type="checkbox" id="urgentFlg" name="urgentFlg" value="y"> <?php echo lang('FORM_ADD_POSITION_URGENT');?>
							    </label>
					  		</div>
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_TYPE');?> :</label>
						<div class="col-sm-8">
							<?php foreach ($JobType as $JobTypes){
								?>
								<div class="checkbox inline-block">
								    <label class="padding-l-0">
								      	<input type="radio" id="jobTypeId<?php echo $JobTypes->jobTypeId; ?>" name="jobTypeId" value="<?php echo $JobTypes->jobTypeId; ?>"> <?php echo $JobTypes->name; ?>
								    </label>
						  		</div>
								<?php
							}
							?>
						</div>
					</div>
		
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PROVINCE');?> :</label>
						<div class="col-sm-8 s2-radius">
							<select class="form-control select2" name="provinceId">
							<?php
								foreach ($Province as $Provinces) {
									echo "<option value='". $Provinces->provinceId ."'>";
									echo $Provinces->name;
									echo "</option>";
								}
							?>
							</select>
							
						</div>
					</div>

				</div>

				<h3><?php echo lang('ADD_POSITION_QUALIFICATION');?></h3>
				 <div class="form-horizontal hidden">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_EDUCATION');?> :</label>
						<div class="col-sm-8">
						</div>
					</div>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('ADD_POSITION_QUALIFICATION');?> :</label>
						<div class="col-sm-8">
							<textarea name="qualification" class="form-control"  rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_GRADE');?> :</label>
						<div class="col-sm-8">
							<select class="form-control" name="levelId" id="levelId">
								<option value=""><?php echo lang('FORM_GRADE');?></option>
							<?php  
							foreach ($Level as $Levels) {
								echo "<option value='".$Levels->levelId."'>";
								echo $Levels->name;
								echo "</option>";
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_MAJOR');?> :</label>
						<div class="col-sm-8">
							<select name="subjectId" id="subjectId" class="form-control select2" multiple="multiple">
							</select>
						</div>
						<div class="col-sm-8 col-sm-offset-3 validSubject" style="display:none;">
							<span class="text-red">โปรดระบุข้อความ</span>
						</div>
					</div>
				</div>
				
		
				<h3><?php echo lang('ADD_POSITION_TIME');?></h3>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_STARTDATE');?> :</label>
						<div class="col-sm-3">
							<div class='input-group date' id='startDateStr'>
			                    <input type='text' class="form-control" name="startDateStr"/>
			                    <span class="input-group-addon">
			                    <span><i class="fa fa-calendar"></i></span>
			                    </span>
			                </div>
						</div>
						<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_ADD_POSITION_ENDDATE');?> :</label>
						<div class="col-sm-3">
							<div class='input-group date' id='stopDateStr'>
			                    <input type='text' class="form-control" name="stopDateStr"/>
			                    <span class="input-group-addon">
			                    <span><i class="fa fa-calendar"></i></span>
			                    </span>
			                </div>
						</div>
					</div>
				</div>
				 
				<h3><?php echo lang('COMP_ADDRESS_INFO');?></h3>
				
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_NAME');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contactName" value="<?php echo $userdata['prefixName'] . $userdata['contactName'] ." ". $userdata['contactLastname'] ;?>">
						</div>
					</div>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contactTel" value="<?php echo $userdata['contactTel'];?>">
						</div>
					</div>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contactEmail" value="<?php echo $userdata['email'];?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="padding-bottom: 20px;">
				<div class="form-group">
					<label class="col-sm-3 control-label text-right margin-t-5">
						<?php echo lang('FORM_ADD_POSITION_STATUS');?> :
					</label>
					<div class="col-sm-2">
						<div class="switch">
							<input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
							<label for="cmn-toggle-7" id='statusId' data-on="<?php echo lang('PUBLISH') ?>" onclick="changeStatusId()" data-off="<?php echo lang('UNPUBLISH') ?>"></label>
							</div>
						<input type="hidden" name="statusId" value="-1">
					</div>
					<div class="col-sm-6 text-right" style="padding-right: 0px;">
						<button class="btn-gray btn" id="cancel">
							<?php echo lang('BTN_CANCEL');?>
						</button>
						<button class="btn-blue btn" id="save">
							<?php echo lang('BTN_SAVE');?>
						</button>
					</div>
					
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#statusId').click()
	var user_id = '<?php echo $this->session->userdata['user_id'];?>';
	$('#startDateStr').datetimepicker({
	 	format: "DD/MM/YYYY",
	 	defaultDate: new Date()
	});
	$('#stopDateStr').datetimepicker({
	 	format: "DD/MM/YYYY",
	 	defaultDate: new Date()
	});

	$("#startDateStr").on("dp.change", function (e) {
        $('#stopDateStr').data("DateTimePicker").minDate(e.date);
    });
    
	$('#levelId').change(function(event) {
    	$("#subjectId").select2("val", "");
		changeSubject($('#levelId').val(),'<?php echo $_server?>','<?php echo lang('ONLOAD'); ?>','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');
	});

	$('#cancel').click(function(event) {
		window.history.back();
	});
	$('#save').click(function(event) {
		$("#addPosition").validate({
			rules: {
				position: {
					required: true,
					maxlength: 256
				},
				provinceId: "required",
				contactDetail: "required",
				qualification: "required",
				subjectId: "required",
				jobTypeId: "required",
				levelId:"required",
				salary: {
					maxlength: 50
				},
				ontactName: {
					required: true,
					maxlength: 1024
				},
				contactEmail: {
					required: true,
					email: true,
					maxlength: 512
				},
				salary: {
					maxlength: 50
				},

			},
			submitHandler: function(form) {
			    var data = new FormData();
				var jobId = $('#addPosition [name="jobId"]').val();
			    var submit = $( "#subjectId").serializeArray();
			    if(submit.length<1){
			    	$('.validSubject').show();
			    }
				for (var i = 0; i < submit.length; i++) {
					data.append('subjectId',submit[i].value);
				}

				positionCount = $('#addPosition [name="positionCount"]').val();
				positionCount = (positionCount)? positionCount :1;
				urgentFlg = ($('#addPosition [name="urgentFlg"]').is(':checked'))? 'y' : 'n';
				
				data.append('jobId', jobId);
				data.append('provinceId', $('#addPosition [name="provinceId"]').val());
				data.append('position', $('#addPosition [name="position"]').val());
				data.append('detail', $('#addPosition [name="detail"]').val());
				data.append('contactName', $('#addPosition [name="contactName"]').val());
				data.append('contactTel', $('#addPosition [name="contactTel"]').val());
				data.append('contactEmail', $('#addPosition [name="contactEmail"]').val());
				data.append('qualification', $('#addPosition [name="qualification"]').val());
				data.append('salary', $('#addPosition [name="salary"]').val());
				data.append('positionCount', positionCount);
				data.append('startDateStr', $('#addPosition [name="startDateStr"]').val());
				data.append('stopDateStr', $('#addPosition [name="stopDateStr"]').val());
				data.append('urgentFlg', urgentFlg);
				data.append('jobTypeId', $('#addPosition [name="jobTypeId"]:checked').val());
				data.append('statusId', $('#addPosition [name="statusId"]').val());
				data.append('lang', '<?php echo $lang?>');
				data.append('token', btoa(user_id));

				$.ajax({
				    url: "<?php echo $_server?>../job/api/updJob.do",
				    data: data,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				    	console.log(data);
				    	if(data.responseCode == 200){
				    		window.location.href = '<?php echo base_url(); ?>position/';
				    	}
					},
				});
			}
		});	
	});
});
function changeStatusId(){
	statusId =$('input[name="statusId"]').val();
	setval = (statusId == 1 )? '-1':'1';
	$('input[name="statusId"]').val(setval)
}
function test(){
	$('input[name="position"]').val('Sales Engineer');
	$('input[name="positionCount"]').val('7');
	$('input[name="salary"]').val('15000');
	$('textarea[name="detail"]').val('- (Out of office) Direct Sales / Promoting products with demonstration using demo units, To Maximize touch point with customer- (Office) Cultivating customers by phone call, Making quotation, Trying to get PO etc.');
	$('select[name="provinceId"]').val('10');
	$('textarea[name="qualification"]').val('- Welcome! Fresh Graduates who do not have related experience.- Bachelors Degree in Engineering (Major : Electrical, Mechatronics) will be an advantage.- Experience as Sales Engineering will be an advantage.- Good command of spoken / written English (TOEIC score: 650 up) Good command of Japanese Language will be an advantage.- Native Thai language- Preferably not over 30 years old- Driving license');
}
</script>