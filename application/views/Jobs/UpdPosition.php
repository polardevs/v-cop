<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/css/toggle-switch.css">
<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<form id="addPosition">
			<div class="row">

				<input type="hidden" name="jobId" value="<?php echo $jobId;?>"/>
				<h2>
					<?php echo (isset($jobId))? lang('ADD_POSITION') : lang('ADD_POSITION') ;?>
				</h2>
				<hr>
				<h3><?php echo lang('ADD_POSITION_POSITION');?></h3>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_POSITION');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="position" value="<?php echo $JobDetail->data->position;?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_COUNT');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="positionCount" value="<?php echo $JobDetail->data->positionCount;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_SALARY');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="salary" value="<?php echo $JobDetail->data->salary;?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_DESCRIPTION');?> :</label>
						<div class="col-sm-8">
							<textarea name="detail" class="form-control" rows="5"><?php echo $JobDetail->data->detail;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_URGENT');?> :</label>
						<div class="col-sm-3">
							<div class="checkbox inline-block">
							    <label>
							      	<input type="checkbox" id="urgentFlg" name="urgentFlg" value="y" <?php echo ($JobDetail->data->urgentFlg =='y')? 'checked': ''; ?> > <?php echo lang('FORM_ADD_POSITION_URGENT');?>
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
								      	<input type="radio" name="jobTypeId" value="<?php echo $JobTypes->jobTypeId; ?>" <?php echo ($JobDetail->data->jobTypeId == $JobTypes->jobTypeId)? 'checked': ''; ?> > <?php echo $JobTypes->name; ?>
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
							<select class="form-contro select2" name="provinceId">
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
							<textarea name="qualification" class="form-control"  rows="5"><?php echo $JobDetail->data->qualification;?></textarea>
							
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
							<input type="text" class="form-control" name="contactName" value="<?php echo $JobDetail->data->contactName;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contactTel" value="<?php echo $JobDetail->data->contactTel;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contactEmail" value="<?php echo $JobDetail->data->contactEmail;?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="padding-bottom: 20px;">
				<div class="form-group">
					<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADD_POSITION_STATUS');?> :</label>
					<div class="col-sm-2">
						<div class="switch">
							<input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
							<label for="cmn-toggle-7" id='statusId' data-on="<?php echo lang('PUBLISH') ?>" onclick="changeStatusId()" data-off="<?php echo lang('UNPUBLISH') ?>"></label>
							</div>
						<input type="hidden" name="statusId" value="-1">
					</div>

					<div class="col-sm-6 text-right" style="padding-right: 0px;">
						<span class="btn-gray btn" id="cancel">
							<?php echo lang('BTN_CANCEL');?>
						</span>
						<button class="btn-blue btn" id="save">
							<?php echo lang('BTN_SAVE');?>
						</button>
						</a>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
	
</div>

<script>
$(document).ready(function(){
	var user_id = '<?php echo $this->session->userdata['user_id'];?>';
	$( "#urgentFlg").change(function(event) {
		var urgentFlg =  ($('#urgentFlg').is(":checked"))? 'y':'n';
		$('#urgentFlg').val(urgentFlg);
	});
	
	$('#startDateStr').datetimepicker({
	 	format: "DD/MM/YYYY",
	 	defaultDate: new Date()
	});
	$('#stopDateStr').datetimepicker({
	 	format: "DD/MM/YYYY",
	 	defaultDate: new Date()
	});
	$("#startDateStr").on("dp.change", function (e) {
		var getDate = e.date._d.getDate();
		var getMonth = e.date._d.getMonth();
		var getFullYear = e.date._d.getFullYear();

		// var maxDate =  e.date._d.getDate() + "/" + (e.date._d.getMonth()+1) + "/" +e.date._d.getFullYear();	
		console.log(getMonth);
        $('#stopDateStr').data("DateTimePicker").minDate(e.date);
        $('#stopDateStr').data("DateTimePicker").maxDate(e.date);
    });

	if('<?php echo $JobDetail->data->levelIds;?>'){
		$('#levelId').val([<?php echo $JobDetail->data->levelIds;?>]);
		changeSubjectUpd('<?php echo $JobDetail->data->levelIds;?>','<?php echo $JobDetail->data->subjectIds;?>');
	}
	

	$('#levelId').change(function(event) {
		$("#subjectId").select2("val", "");
		changeSubject($('#levelId').val(),'<?php echo $_server?>','<?php echo lang('ONLOAD'); ?>','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');
	});

	$('#addPosition [name="provinceId"]').val('<?php echo $JobDetail->data->provinceId;?>');
	$('#addPosition [name="startDateStr"]').val(FormatDT('<?php echo $JobDetail->data->startDate;?>','/'));
	$('#addPosition [name="stopDateStr"]').val(FormatDT('<?php echo $JobDetail->data->endDate;?>','/'));
	if('<?php echo $JobDetail->data->statusId;?>'=='1')	$('#statusId').click();
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
				salary: {
					maxlength: 50
				}
			},
			submitHandler: function(form) {
			    var data = new FormData();
				var submit = $( "form#addPosition").serializeArray();
				for (var i = 0; i < submit.length; i++) {
					data.append(submit[i].name,submit[i].value);
				}
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
				    	window.location='<?php echo site_url(); ?>position';
					},
				});
			}
		});	
	});
	
});
function changeSubjectUpd(levelId,change) {
	levelId = levelId.replace(/ /g,"");
	change = change.replace(/ /g,"").split(",");
	console.log('changeSubject');
	var Subject = $.post('<?php echo $_server?>../job/api/jobSubject.do?levelId='+levelId);
	Subject.done(function( data ) {
		$('#subjectId').html('');
		text = '';
		for (var i = 0; i < data.length; i++) {
			var level = data[i];
			text += 	'<optgroup label="'+ level.name +'" >';
			for (var j = 0; j < data[i].subjectList.length; j++) {
				var subject = data[i].subjectList[j];
				text += '<option value="'+ subject.subjectId +'">'+subject.name +
								'</option>';
					
			}
			text += '</optgroup>';
		}
		$('#subjectId').append(text);
		if(change) $("#subjectId").select2("val", change);
	});
}

function changeStatusId(){
	statusId =$('input[name="statusId"]').val();
	setval = (statusId == 1 )? '-1':'1';
	$('input[name="statusId"]').val(setval)
}
</script>