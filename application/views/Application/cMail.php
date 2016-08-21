<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="inline-block">ติดต่อผู้สมัคร</h2>
					<?php if( $this->input->post('jobId') ){ ?>
					<a href="<?php echo site_url();?>position/company-apprentice?jobId=<?php echo $this->input->post('jobId');?>">
						<button class="btn btn-blue pull-right" style="margin-top: 20px;">	
							รายชื่อผู้สมัครงานท่านอื่น
						</button>
					</a>
					<?php } ?>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_NAME');?> :
							</label>
							<div class="col-sm-10" style="padding-top: 7px;">
								<span id="name"></span>
							</div>
							<div class="clearfix"></div>
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_ADDRESS');?> :
							</label>
							<div class="col-sm-10" style="padding-top: 7px;">
								<span id="address"></span>
							</div>
							<div class="clearfix"></div>
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_EMAIL');?> :
							</label>
							<div class="col-sm-10" style="padding-top: 7px;">
								<span id="email"></span>
							</div>
							<div class="clearfix"></div>
							<input type="hidden" class="form-control" name="appId" value="<?php echo $this->input->post('appId');?>">

							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_POSITION');?> :
							</label>
							<?php $disabled = ($this->input->post('appId'))? 'disabled':'' ?>
							<div class="col-sm-10" style="padding-top: 7px;">
								<select class="form-control" id="JobLists" <?php echo $disabled ?>></select>
							</div>
							<div class="clearfix"></div>
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_ADD_POSITION_STATUS') ?> :
							</label>
							<div class="col-sm-10" style="padding-top: 7px;">
								<select name="appStatusId" class="form-control">
									<option value="2">นัดสัมภาษณ์</option>
									<option value="3">กำลังพิจารณา</option>
									<option value="4">รับเข้าทำงาน</option>
									<option value="5">ปฏิเสธการรับเข้าทำงาน</option>
								</select>
							</div>
							<div class="clearfix"></div>
							<label class="col-sm-2 control-label text-right">
								ข้อความ :
							</label>
							<div class="col-sm-10" style="padding-top: 7px;">
								<textarea name="remark" rows="5" class="form-control"></textarea>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12">
								<button class="btn btn-blue pull-right" id="send" style="margin-top: 20px;">
									ส่งข้อความ
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel-body chat-box-chats c-mail-chat"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var jobId ='<?php echo $this->input->post('jobId');?>';
		var userId ='<?php echo $userdata['user_id'];?>';
		var	lang = '<?php echo $lang ;?>'
		studentId = ('<?php echo $this->input->post('studentId');?>')? '<?php echo $this->input->post('studentId');?>': '<?php echo $this->input->get('userId');?>';
		var params={
			userId : studentId,
			lang : lang,
			token: btoa(userId) 
		}
		console.log(params);

		var api = $.post( '<?php echo $_server?>getStudentDetail.do?',params);
		api.done(function( data ) {
			StudentDetail = data.data;
			$('#name').html(StudentDetail.firstname);	
			$('#address').html(StudentDetail.province);	
			$('#email').html(StudentDetail.email);	
		});
		
		var parameter = {
			corpId: '<?php echo $_corpId; ?>',
			limit: 100,
			lang: lang
		}

		var JobList = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
		JobList.done(function( data ) {
			for (var i = 0; i < data.recordsTotal; i++) {
				var JobLists = data.data[i];
				var selected = (JobLists.jobId == jobId )? 'selected': '';
				var text = '';
				text =	'<option value="'+ JobLists.jobId +'" '+selected+'>'+ 
							JobLists.position +
						'</option>';
			   	$('#JobLists').append(text);
			}
		
		});
		getMessage();
		setInterval(function(){getMessage();}, 10000);

		
		$('#send').click(function(event) {
			if('<?php echo $this->input->post('appId');?>'){
				parameter = {
					appId: $('input[name="appId"]').val(),
					appStatusId: $('select[name="appStatusId"]').val(),
					remark: $('textarea[name="remark"]').val(),
					lang: '<?php echo $lang; ?>',
					token: btoa(userId)
				}
				var JobList = $.post( '<?php echo $_server?>../jobapplication/api/updateStatus.do',parameter);
				JobList.done(function( data ) {
					console.log(data);
					if(data.responseCode==200){
						alert('เปลี่ยนสถานะเรียบร้อย');
						window.location = '<?php echo site_url();?>position/company-apprentice?jobId='+jobId;
					}else{
						alert('ไม่สามารส่งข้อความได้');
					}
				});
			}else{
				userIds = '<?php echo $this->input->post('studentId');?>';
				if('<?php echo $this->input->get('userId');?>'){
					userIds = '<?php echo $this->input->get('userId');?>';
				}
				console.log(userIds);
				parameter = {
					jobId: $('#JobLists').val(),
					userId: userIds,
					remark: $('textarea[name="remark"]').val(),
					lang: '<?php echo $lang; ?>',
					token: btoa(userId)
				}
				var JobList = $.post('<?php echo $_server?>../jobapplication/api/corpInviteStd.do',parameter);
				JobList.done(function( data ) {
					console.log(parameter);
					if(data.responseCode==200){
						alert('เปลี่ยนสถานะเรียบร้อย');
						window.location = '<?php echo site_url();?>position';
					}else{
						alert('ไม่สามารส่งข้อความได้');
					}
				});
			}
		});
	});
	function getMessage(){
		$('.c-mail-chat').html('');
		var parameters={
			appId: '<?php echo $this->input->post('appId');?>' ,
			lang: '<?php echo $lang ;?>'
		}
		var getMessage = $.post( '<?php echo $_server?>../jobapplication/api/getMessage.do?',parameters);
		getMessage.done(function( data ) {
			if(data.responseCode){
				for (var i = 0; i < data.data.length; i++) {
					Messages = data.data[i];
					if(Messages.userId== '<?php echo $userdata['user_id'];?>'){
						text =	'<div class="row chat-box-chat">'+
									'<div class="col-xs-4">'+
										'<p class="chat-box-date">'+FormatDTFullMounth(Messages.createdDate)+'</p>'+
									'</div>'+
									'<div class="col-xs-8"> '+
										'<div class="bubble-i">'+
											'<span>'+ Messages.message +'</span>'+
										'</div>'+
									'</div>'+
								'</div>';
					}else{
						text =	'<div class="row chat-box-chat">'+
									
									'<div class="col-xs-8"> '+
										'<div class="bubble-j">'+
											'<span>'+ Messages.message +'</span>'+
										'</div>'+
									'</div>'+
									'<div class="col-xs-4">'+
										'<p class="chat-box-date">'+FormatDTFullMounth(Messages.createdDate)+'</p>'+
									'</div>'+
								'</div>';
					}
					$('.chat-box-chats').append(text);
				}
				var d = $('.c-mail-chat');
				d.scrollTop(d.prop("scrollHeight"));
			}
		});
	}
	function FormatDTFullMounth(dateset){
		var convertedStartDate = new Date(dateset);
	    var month = ("0" + (convertedStartDate.getMonth() + 1)).slice(-2)
	    var day = ("0" + convertedStartDate.getDate()).slice(-2);
	    var year = convertedStartDate.getFullYear();
	    switch(month) {
		    case '01':
		        var month = "<?php echo lang('MONTH_01');?>"
		        break;
		    case '02':
		       	var month = "<?php echo lang('MONTH_02');?>"
		        break;
		    case '03':
		       	var month = "<?php echo lang('MONTH_03');?>"
		        break;
		    case '04':
		       	var month = "<?php echo lang('MONTH_04');?>"
		        break;
		    case '05':
		       	var month = "<?php echo lang('MONTH_05');?>"
		        break;
		    case '06':
		       	var month = "<?php echo lang('MONTH_06');?>"
		        break;
		    case '07':
		       	var month = "<?php echo lang('MONTH_07');?>"
		        break;
		    case '08':
		       	var month = "<?php echo lang('MONTH_08');?>"
		        break;
		    case '09':
		       	var month = "<?php echo lang('MONTH_09');?>"
		        break;
		    case '10':
		       	var month = "<?php echo lang('MONTH_10');?>"
		        break;
		    case '11':
		       	var month = "<?php echo lang('MONTH_11');?>"
		        break;
		    case '12':
		       	var month = "<?php echo lang('MONTH_12');?>"
		        break;
		}
	    var shortStartDate = day + ' ' + month + ' ' + year;
	    return shortStartDate;
	}

</script>