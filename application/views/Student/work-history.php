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
					<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?>
				</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3 style="display: inline-block;">
						<?php echo lang('HISTORY_LIST');?>
					</h3>

					<button class="btn-blue btn center-block pull-right hidden-xs insert-modal" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						<?php echo lang('BTN_ADD_COMPANY');?>
					</button>

					<button class="btn-blue btn center-block pull-right insert-modal visible-xs" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						+
					</button>

					
					<button class="btn-blue btn center-block pull-right visible-xs upload" style="margin-top: 15px; margin-right: 15px;" data-toggle="modal" data-target="#upload-modal">
						<i class="fa fa-upload"></i>
					</button>

					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('FORM_CROP_NAME');?></th>
								<th><?php echo lang('MAIN_JOB_SALARY_STUDENT');?></th>
								<th><?php echo lang('FORM_SWORK_START');?></th>
								<th><?php echo lang('FORM_SWORK_TO');?></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($UserEmployedHistory->data as $UserEmployedHistorys) {
							?>
							<tr>
								<td><?php echo $UserEmployedHistorys->companyName?></td>
								<td><?php echo $UserEmployedHistorys->salary?></td>
								<td>
									<?php echo date('d-m-Y', strtotime($date=$UserEmployedHistorys->startDate));?>
								</td>
								<td>
									<?php 
									if($date=$UserEmployedHistorys->endDate){
										echo date('d-m-Y', strtotime($date=$UserEmployedHistorys->endDate));
									}
									?>
								</td>
								<td class="text-center">
									<a data-toggle="tooltip" title="แก้ไขข้อมูล" class="none-decoration" onclick="UpdateHistory('<?php echo $UserEmployedHistorys->empHistoryId; ?>')">
										<i class="fa fa-pencil-square-o text-blue" data-toggle="modal" data-target="#insert-modal"></i> 
									</a>

									<span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class='label label-danger pointer' onclick='removeHistory(<?php echo $UserEmployedHistorys->empHistoryId?>)' &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;">
										<i class="fa fa-trash"></i>
									</span>								
								</td>
							</tr>
							<?php } ?>
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
			        	<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?>
			        </h4>
		      	</div>
			    <div class="modal-body">
			    	<div class="form-horizontal" id="work-history">
			    		<input type="hidden" class="form-control" name="empHistoryId">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_NAME');?>  :</label>
							<div class="col-sm-7"><input type="text" class="form-control" name="companyName"></div>
							<div class="col-sm-7 col-sm-offset-3 error error" id="error-title" style="display:none;"></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_POSITION');?>  :</label>
							<div class="col-sm-7"><input type="text" class="form-control" name="jobTitle"></div>
							<div class="col-sm-7 col-sm-offset-3 error" id="error-jobTitle" style="display:none;"></div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SWORK_START');?> :</label>
							<div class="col-sm-3">
								<div class='input-group date' id='startDate'>
				                    <input type='text' class="form-control" name="startDate"/>
				                    <span class="input-group-addon">
				                    <span><i class="fa fa-calendar"></i></span>
				                    </span>
				                </div>
							</div>

							<label class="col-sm-1 control-label text-right"><?php echo lang('FORM_SWORK_TO');?> :</label>
							<div class="col-sm-3">
								<div class='input-group date' id='endDate'>
				                    <input type='text' class="form-control" name="endDate"/>
				                    <span class="input-group-addon">
				                    <span><i class="fa fa-calendar"></i></span>
				                    </span>
				                </div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right" style="padding-left: 0px;"><?php echo lang('MAIN_JOB_SALARY_STUDENT');?> :</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="salary" id="salary">
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PORT_DESC');?> :</label>
							<div class="col-sm-7">
								<textarea class="form-control" rows="3" name="detail"></textarea>
							</div>
							<div class="col-sm-7 col-sm-offset-3 error" id="error-detail" style="display:none;"></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right">ใบผ่านงาน :</label>
							<div class="col-sm-7">
								<input type="file" id="attachment" name="attachment">
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
		$('#attachment').filestyle({
			buttonName : 'btn-info  btn',
			buttonText: 'เลือกไฟล์'
		});

		$('#startDate').datetimepicker({
		 	format: "DD-MM-YYYY",
		 	defaultDate: new Date()
		});

		$('#endDate').datetimepicker({
		 	format: "DD-MM-YYYY"
		});

		$("#startDate").on("dp.change", function (e) {
	        $('#endDate').data("DateTimePicker").minDate(e.date);
	    });
	    
		$('#insert-modal [name="companyName"]').keydown(function(event) {
			formpast = true
			$('#error-title').hide();
		});
		$('#insert-modal [name="detail"]').keydown(function(event) {
			formpast = true
			$('#error-detail').hide();
		});

		$('#salary').keypress(function(e) {
		    var a = [];
		    var k = e.which;
		    
		    for (i = 48; i < 58; i++)
		        a.push(i);
		    
		    if (!(a.indexOf(k)>=0))
		        e.preventDefault();
		});

		$('.insert-modal').click(function(event) {
			$('#insert-modal [name="detail"]').val('');
			$('#insert-modal [name="salary"]').val('');
			$('#insert-modal [name="companyName"]').val('');
			$('#insert-modal [name="endDate"]').val('');
			$('#insert-modal [name="startDate"]').val( FormatDT(Date()) );
			$('#insert-modal [name="empHistoryId"]').val('');
			$('#insert-modal [name="jobTitle"]').val('');
			$('.attFilePath').hide();

		});

		$('#myModalLabel').dblclick(function(event) {
			$('#insert-modal [name="detail"]').val('test');
			$('#insert-modal [name="salary"]').val('10000');
			$('#insert-modal [name="companyName"]').val('test');
			$('#insert-modal [name="jobTitle"]').val('test');
		});

	    $('#insert').click(function(event) {
	    	LoadingPage();
			var attFilePathOld = $("#attFilePathOld").attr("href");
			var formpastCompany = validCompanyName();
			var formpastDetail  = validDetail();
			var formpastobTitle = validJobTitle();
			var formpastAtt = validAttachments(attFilePathOld);
			
			var data = new FormData();
			
			data.append('lang', '<?php echo $lang?>');
			data.append('detail', $('#insert-modal [name="detail"]').val());
			data.append('salary', $('#insert-modal [name="salary"]').val());
			data.append('companyName', $('#insert-modal [name="companyName"]').val());
			data.append('endDate', $('#insert-modal [name="endDate"]').val());
			data.append('startDate', $('#insert-modal [name="startDate"]').val());
			data.append('empHistoryId', $('#insert-modal [name="empHistoryId"]').val());
			data.append('jobTitle', $('#insert-modal [name="jobTitle"]').val());
			data.append('attachment', $('#insert-modal [name="attachment"]')[0].files[0]);
			data.append('token', btoa('<?php echo $userdata['user_id'] ?>'));

			if(formpastCompany && formpastDetail && formpastobTitle && formpastAtt){
				$.ajax({
				    url: "<?php echo $_server?>updUserEmployedHistory.do",
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
			}else{
				UnLoadingPage();
			}
		});
	});

	function UpdateHistory(empHistoryId) {
		var api = $.post('<?php echo $_server?>getUserEmployedHistoryDtl.do?empHistoryId='+empHistoryId);
		api.done(function( data ) {
			EmployedHistoryDtl = data.data;
			$('#insert-modal [name="empHistoryId"]').val(EmployedHistoryDtl.empHistoryId);
			$('#insert-modal [name="companyName"]').val(EmployedHistoryDtl.companyName);
			$('#insert-modal [name="detail"]').val(EmployedHistoryDtl.detail);
			$('#insert-modal [name="salary"]').val(EmployedHistoryDtl.salary);
			$('#insert-modal [name="jobTitle"]').val(EmployedHistoryDtl.jobTitle);
			var startDate = FormatDT (EmployedHistoryDtl.startDate);
			var endDate = (EmployedHistoryDtl.endDate)? FormatDT (EmployedHistoryDtl.endDate) : '';
			$('#startDate .form-control').val(startDate)
			$('#endDate .form-control').val(endDate)
			if(EmployedHistoryDtl.filePath){
				$( ".attFilePath" ).html('<a id="attFilePathOld" href="'+EmployedHistoryDtl.filePath+'" target="_blank" ><?php echo lang('DOWNLOAD').' '.lang('FORM_PORT_TRAIN_SHEET');?></a>').show();
			}
		});
	}

	function removeHistory(empHistoryId){
		var parameters ={
				empHistoryId: empHistoryId , 
				lang:'<?php echo $lang?>',
				token: btoa('<?php echo $userdata['user_id'] ?>')
		}
		var api = $.post('<?php echo $_server?>delUserEmployedHistory.do?',parameters);
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}

	function validJobTitle(){
		var jobTitle = $('#insert-modal [name="jobTitle"]').val();
		formpast = true
		if(!jobTitle){
			$('#error-jobTitle').html('<b><?php echo lang('ENTER_A_MESSAGE') ?></b>').show();
			formpast = false;
		}
		else if(jobTitle.length > 1204){
			$('#error-jobTitle').html('<b><?php echo lang('ENTER_MESSAGE_NOT_OVER_1204') ?></b>').show();
			formpast = false;
		}
		return formpast;
	}

	function validCompanyName(){
		var companyName = $('#insert-modal [name="companyName"]').val();
		formpast = true
		if(!companyName){
			$('#error-title').html('<b><?php echo lang('ENTER_A_MESSAGE') ?></b>').show();
			formpast = false;
		}
		else if(companyName.length > 512){
			$('#error-title').html('<b><?php echo lang('ENTER_MESSAGE_NOT_OVER_512') ?></b>').show();
			formpast = false;
		}
		return formpast;
	}

	function validDetail(){
		var detail = $('#insert-modal [name="detail"]').val();
		formpast = true
		if(!detail){
			$('#error-detail').html('<b><?php echo lang('ENTER_A_MESSAGE') ?></b>').show();
			formpast = false;
		}
		else if(detail.length > 1204){
			$('#error-detail').html('<b><?php echo lang('ENTER_MESSAGE_NOT_OVER_1204') ?></b>').show();
			formpast = false;
		}
		return formpast;
	}
</script>