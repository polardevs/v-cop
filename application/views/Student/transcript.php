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
				<h3><?php echo lang('FORM_TRANSCRIPT');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3 style="display: inline-block;">
						<?php echo lang('STUDENT_TRANSCRIPT_LIST');?>
					</h3>
					<button class="btn-blue btn center-block pull-right hidden-xs insert-modal" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						<?php echo lang('BTN_ADD_PORT');?>
					</button>
					<button class="btn-blue btn center-block pull-right insert-modal visible-xs" style="margin-top: 15px;" data-toggle="modal" data-target="#insert-modal">
						+
					</button>
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('FILE_NAME')?></th>
								<th><?php echo lang('FORM_PORT_DATE')?></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
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
			        <h4 class="modal-title" id="myModalLabel"><?php echo lang('FORM_TRANSCRIPT');?></h4>
		      	</div>
			    <div class="modal-body">
			    	<div class="form-horizontal" id="work-history">
			    		<input type="hidden" class="form-control" name="stdPortId">
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FILE_NAME');?> :
								<span class="text-red"> *</span>
							</label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" name="title">
							</div>
							
							<div class="col-sm-8 error" id="error-title" style="display:none;"></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">
								<?php echo lang('FORM_PORT_SHEET');?> : 
								<span class="text-red"> *</span>
							</label>
							<div class="col-sm-8">
								<input type="file" class="attachment" name="attachment">
							</div>
							<div class="col-sm-8 col-sm-offset-2 attFilePath" style="display:none;"></div>
							<div class="col-sm-8 error" id="error-attachment" style="display:none;"></div>
							<div class="col-sm-7 Suggestion">
								<small>
									<b><?php echo lang('SUGGESTION');?></b> : 
									<?php echo lang('SUGGESTION_FILE');?>
								</small>
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
		LoadingPage();
		$('.attachment').filestyle({
			buttonName : 'btn-info  btn',
			buttonText: 'เลือกไฟล์'
		});
		 
		$('#issuedDate').datetimepicker({
		 	format: "DD-MM-YYYY",
		 	defaultDate: new Date()
		});
		
		var formpast = true
		var user_id = '<?php echo $this->session->userdata['user_id'];?>';

		// ### check validate title
		$('#insert-modal [name="title"]').blur(function(event) {
			validTitle();
		});
		$('#insert-modal [name="title"]').keydown(function(event) {
			formpast = true
			$('#error-title').hide();
		});
		$('#insert-modal [name="attachment"]').blur(function(event) {
			validAttachment();	
			$('.Suggestion').addClass('col-sm-offset-2')
			if (validAttachment() == true){
				$('.Suggestion').removeClass('col-sm-offset-2')
			}
		});

		$('.insert-modal').click(function(event) {
			$('#insert-modal [name="title"]').val('');
			$('.attFilePath').hide();
		});

		$('#insert').click(function(event) {
			formpastTitle = validTitle();
			formpastAtt = validAttachment();
			
			var data = new FormData();
			data.append('attachment', $('#insert-modal [name="attachment"]')[0].files[0]);
			data.append('lang', '<?php echo $lang?>');
			data.append('peopleId', peopleId);
			data.append('title', $('#insert-modal [name="title"]').val());
			if(formpastTitle && formpastAtt){
				$.ajax({
				    url: "<?php echo $_server?>uploadTranscript.do",
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

	  	var parameters = {
			userId : user_id,
			token : btoa(user_id) ,
			lang: '<?php echo $lang?>'
	  	}

	  	var api = $.post( '<?php echo $_server?>getStudentDetail.do?',parameters);
	   	api.done(function( data ) {
	   		if (data.responseCode ==200) {
	   			peopleId = data.data.peopleId;
	   			var parameter = {
					peopleId: peopleId,
					lang: '<?php echo $lang ;?>'
				}
				var Subject = $.post('<?php echo $_server?>getTranscriptList.do',parameter);
				Subject.done(function( data ) {
					if (data.responseCode ==200) {
						console.log(data);
						for (var i = 0; i < data.data.length; i++) {
							TList = data.data[i];
							text = 	'<tr>'+
										'<td>'+TList.title+'</td>'+
										'<td>'+FormatDT(TList.modifiedDate,'-')+'</td>'+
										'<td class="text-center">'+
											'<a href="'+TList.filePath+'" target="_blank"  title="เอกสารประกอบ" data-toggle="tooltip">'+
												'<i class="fa fa-file text-blue"></i>'+
											'</a> '+
										
											' <span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class=&#39;label label-danger pointer&#39; onclick=&#39;del('+TList.tscId+')&#39; &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>'+
										'</td>'+
									'</tr>';
							$('tbody').append(text);
							UnLoadingPage();
							tooltipster();
							$('[data-toggle="tooltip"]').tooltip();
						}
					}
				});
	   		}
	   		UnLoadingPage();   		
		});
	});

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

	function del(Id){
		console.log(Id);
		var api = $.post('<?php echo $_server?>delTranscript.do?',{tscId: Id , lang:'<?php echo $lang?>'});
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}
</script>

