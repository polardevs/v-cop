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
				<h3>
					<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_TRAIN');?>
				</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3 style="display: inline-block;">
						<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_TRAIN');?>
					</h3>
					<button class="btn-blue btn center-block pull-right hidden-xs insert-modal" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						<?php echo lang('BTN_ADD_TRAIN');?>
					</button>

					<button class="btn-blue btn center-block pull-right visible-xs insert-modal" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						+
					</button>

					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('FORM_TRAIN_COURSE');?></th>
								<th><?php echo lang('FORM_TRAIN_SCHOOL');?></th>
								<th><?php echo lang('FORM_PORT_DATE');?></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($TrainingHistory->data as $TrainingHistorys) {
							?>
							<tr>
								<td><?php echo $TrainingHistorys->title; ?></td>
								<td><?php echo $TrainingHistorys->courseOwner; ?></td>
								<td>
									<?php 
									if($date=$TrainingHistorys->issuedDate){
										echo date('d-m-Y', strtotime($date=$TrainingHistorys->issuedDate));
									}
									?>
								</td>
								<td class="text-center">
									<a data-toggle="tooltip" title="แก้ไขข้อมูล" class="none-decoration" onclick="UpdateHistory('<?php echo $TrainingHistorys->trainingHstryId; ?>')">
										<i class="fa fa-pencil-square-o text-blue" data-toggle="modal" data-target="#insert-modal"></i> 
									</a>
									<span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class='label label-danger pointer' onclick='removeHistory(<?php echo $TrainingHistorys->trainingHstryId;?>)' &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="insert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">
			        	<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_TRAIN');?>
			        </h4>
		      	</div>
			    <div class="modal-body">
			    	<div class="form-horizontal" id="work-history">
			    		<input type="hidden" class="form-control" name="trainingHstId">
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TRAIN_COURSE');?> :</label>
							<div class="col-sm-7"><input type="text" class="form-control" name="title"></div>
							<div class="col-sm-7 col-sm-offset-3 error" id="error-title" style="display:none;"></div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TRAIN_SCHOOL');?> :</label>
							<div class="col-sm-7"><input type="text" class="form-control" name="courseOwner"></div>
							<div class="col-sm-7 col-sm-offset-3 error" id="error-course" style="display:none;"></div>
						</div>
						
						

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PORT_DATE');?> :</label>
							<div class="col-sm-7">
								<div class='input-group date' id='issuedDate'>
				                    <input type='text' class="form-control" name="issuedDate"/>
				                    <span class="input-group-addon">
				                    <span><i class="fa fa-calendar"></i></span>
				                    </span>
				                </div>
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PORT_DESC');?> :</label>
							<div class="col-sm-7"><textarea class="form-control" rows="3" name="detail"></textarea></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PORT_TRAIN_SHEET');?> :</label>
							<div class="col-sm-7">
								<input type="file" class="attachment" name="attachment">
							</div>
							<div class="col-sm-7 col-sm-offset-3 attFilePath" style="display:none;"></div>
							<div class="col-sm-7 col-sm-offset-3 error" id="error-attachment" style="display:none;"></div>
							<div class="col-sm-7 col-sm-offset-3">
								<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>
							</div>
						</div>
					</div>
			    </div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">
			        	<?php echo lang('BTN_CANCEL');?>
			        </button>
			        <button type="button" class="btn btn-blue" id="insert">
			        	<?php echo lang('BTN_SAVE');?>
			        </button>
		      	</div>
		    </div>
		</div>
	</div>

	
</div>

<script>
	$(document).ready(function() {
		
		$('.attachment').filestyle({
			buttonName : 'btn-info  btn',
			buttonText: 'เลือกไฟล์'

		});
		$('#issuedDate').datetimepicker({
		 	format: "DD-MM-YYYY",
		 	defaultDate: new Date()
		});
		$('#insert-modal [name="title"]').blur(function(event) {
			validTitle();
		});
		$('#insert-modal [name="title"]').keydown(function(event) {
			formpast = true
			$('#error-title').hide();
		});
		$('#insert-modal [name="courseOwner"]').blur(function(event) {
			validCourseOwner();
		});
		$('#insert-modal [name="courseOwner"]').keydown(function(event) {
			formpast = true
			$('#error-course').hide();
		});
		$('#insert-modal [name="attachment"]').blur(function(event) {
			validAttachment();		
		});

		$('.insert-modal').click(function(event) {
			$('#insert-modal [name="issuedDate"]').val( FormatDT(new Date()) );
			$('#insert-modal [name="title"]').val('');
			$('#insert-modal [name="detail"]').val('');
			$('#insert-modal [name="trainingHstId"]').val('');
			$('#insert-modal [name="courseOwner"]').val('');
			$('.attFilePath').hide();
			$('#insert-modal [class="attFilePath"]').html('');
		});

		$('#myModalLabel').dblclick(function(event) {
			$('#insert-modal [name="title"]').val('test');
			$('#insert-modal [name="detail"]').val('test');
			$('#insert-modal [name="courseOwner"]').val('test');
		});

		$('#insert').click(function(event) {
			var attFilePathOld = $("#attFilePathOld").attr("href");
			title = validTitle();
			file = validAttachments(attFilePathOld);
			course = validCourseOwner();
			
			var data = new FormData();
			
			data.append('attachment', $('#insert-modal [name="attachment"]')[0].files[0]);
			data.append('lang', '<?php echo $lang?>');
			data.append('issuedDate', $('#insert-modal [name="issuedDate"]').val());
			data.append('courseOwner', $('#insert-modal [name="courseOwner"]').val());
			data.append('title', $('#insert-modal [name="title"]').val());
			data.append('detail', $('#insert-modal [name="detail"]').val());
			data.append('trainingHstId', $('#insert-modal [name="trainingHstId"]').val());
			data.append('token', btoa('<?php echo $userdata['user_id'] ?>'));
			
			if(title && file && course){
				$.ajax({
				    url: "<?php echo $_server?>updUserTrainingHistory.do",
				    data: data,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				    	console.log(data);
				    	if(data.responseCode == 200){
				    		location.reload();
				    	}
					}
				});
				$('#insert-modal').modal('hide');
			}
		});
	});
	// function validAttachments(attFilePathOld){
	// 	if(attFilePathOld){
	// 		return formpast;
	// 	}
	// 	else{
	// 		var filetype = $('#insert-modal [name="attachment"]')[0].files[0];
	// 		if (filetype){
	// 			console.log(filetype.type);
	// 			if(filetype.type == 'application/pdf' || filetype.type == 'image/png' || filetype.type == 'image/jpeg') {
	// 				formpast = true;
	// 				$('#error-attachment').hide();
	// 			}
	// 			else {
	// 				$('#error-attachment').html('<b>โปรดเลือกไฟล์ที่นามสกุล .pdf, .png, .jpg หรือ .jpeg เท่านั้น</b>').show();
	// 				formpast = false;
	// 			}
	// 			console.log(formpast);
	// 		}else{
	// 			$('#error-attachment').html('<b>เพิ่มประกาศ, เกียรติบัตรหรือเอกสารอื่นๆที่อ้างอิงได้ เพื่อประกอบความน่าเชื่อถือ</b>').show();
	// 			formpast = false;
	// 		}
	// 		return formpast;
	// 	}

	// }
	
	function validTitle(){
		var title = $('#insert-modal [name="title"]').val();
		formpast = true
		if(!title){
			$('#error-title').html('<b><?php echo lang('ENTER_A_MESSAGE') ?></b>').show();
			formpast = false;
		}
		else if(title.length > 1204){
			$('#error-title').html('<b><?php echo lang('ENTER_MESSAGE_NOT_OVER_1204') ?></b>').show();
			formpast = false;
		}
		return formpast;
	}
	function validCourseOwner(){
		var courseOwner =  $('#insert-modal [name="courseOwner"]').val();
		formpast = true
		if(!courseOwner){
			console.log(226);
			$('#error-course').html('<b><?php echo lang('ENTER_A_MESSAGE') ?></b>').show();
			formpast = false;
		}
		else if(courseOwner.length > 512){
			console.log(231);
			$('#error-course').html('<b><?php echo lang('ENTER_MESSAGE_NOT_OVER_512') ?></b>').show();
			formpast = false;
		}
		return formpast;
	}

	function removeHistory(trainingHstId){
		LoadingPage();
		var parameters = {
			trainingHstId: trainingHstId , 
			lang:'<?php echo $lang?>',
			token: btoa('<?php echo $userdata['user_id'] ?>')
		}
		var api = $.post('<?php echo $_server?>delUserTrainingHistory.do?',parameters);
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
			else{
				UnLoadingPage();
			}
		});
	}
	
	function UpdateHistory(trainingHstryId) {
		var api = $.post('<?php echo $_server?>getUserTrainingHistoryDtl.do?trainingHstryId='+trainingHstryId);
		api.done(function( data ) {
			TrainingHistory = data.data;
			$( ".attFilePath" ).hide();
			$('#insert-modal [name="issuedDate"]').val(TrainingHistory.issuedDate);
			$('#insert-modal [name="title"]').val(TrainingHistory.title);
			$('#insert-modal [name="courseOwner"]').val(TrainingHistory.courseOwner);
			$('#insert-modal [name="detail"]').val(TrainingHistory.detail);
			$('#insert-modal [name="trainingHstId"]').val(TrainingHistory.trainingHstryId);
			if(TrainingHistory.filePath){
				$( ".attFilePath" ).html('<a id="attFilePathOld" href="'+TrainingHistory.filePath+'" target="_blank" ><?php echo lang('DOWNLOAD').' '.lang('FORM_PORT_TRAIN_SHEET');?></a>').show();
			}
			$('#insert-modal [name="portTypeId"]').val(TrainingHistory.portTypeId);
			var issuedDate = FormatDT (TrainingHistory.issuedDate);
			$('#issuedDate .form-control').val(issuedDate)
		});
	}
</script>