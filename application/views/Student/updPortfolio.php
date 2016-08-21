<div class="container body-student">
	<div class="row">
		<div class="col-sm-3" style="border-right: 2px solid #ccc">
			<div class="bg-info">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9">
			<div class="bg-gray">
				<h3><?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-horizontal" id="insert-modal">
			    		<input type="hidden" class="form-control" name="stdPortId" value="<?php echo $this->input->get("stdPortId"); ?>">
						<div class="form-group">
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_NAME');?> :<span class="text-red"> *</span></label>
							<div class="col-sm-8"><input type="text" class="form-control" name="title"></div>
							<div class="col-sm-8 col-sm-offset-2 error" id="error-title" style="display:none;"></div>
						</div>
						

						<div class="form-group">
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_TYPE');?> :</label>
							<div class="col-sm-3">
								<select class="form-control" name="portTypeId">
								<?php
									foreach ($PortType as $PortTypes) {
										echo '<option value="'. $PortTypes->portTypeId .'">' . $PortTypes->name . '</option>';
									}
								?>
								</select>
							</div>
							<div class="col-sm-5" id="portTypeOther" style="display: none;">
								<input type="text" class="form-control" name="portTypeOther">
							</div>
							<label class="col-sm-2 control-label text-right hidden">
								<?php echo lang('FORM_PORT_TYPE');?> :
							</label>
							<div class="col-sm-3 hidden">
								<select class="form-control" name="portLvId">
								<?php
									foreach ($PortLevel as $PortLevel) {
										echo '<option value="'. $PortLevel->portLvId .'">' . $PortLevel->name . '</option>';
									}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_DATE');?> :</label>
							<div class="col-sm-3">
								<div class='input-group date' id='issuedDate'>
				                    <input type='text' class="form-control" name="issuedDate"/>
				                    <span class="input-group-addon">
				                    <span><i class="fa fa-calendar"></i></span>
				                    </span>
				                </div>
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_DESC');?> :</label>
								<div class="col-sm-8"><textarea class="form-control" rows="3" name="detail"></textarea></div>
							</div>
						<div class="form-group pull-right">
							<div class="col-sm-2 ">
								<button type="button" class="btn btn-blue" id="add-file">
						        	<?php echo lang('ADD_FILE'); ?>
						        </button>
							</div>	
						</div>	

						<div id="input-attachment">	

							<div class="form-group">
								<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_SHEET');?> : <span class="text-red"> *</span></label>
								<div class="col-sm-8">
									<input type="file" class="attachment" name="attachment1">
								</div>
								<div class="col-sm-8 col-sm-offset-2 attFilePath" style="display:none;"></div>
								<div class="col-sm-8 col-sm-offset-2 error" id="error-attachment-1" style="display:none;"></div>
								<div class="col-sm-7 col-sm-offset-2">
									<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>
								</div>
							</div>
						</div>
						<div id="error-attachment"></div>
					</div>
				</div>
				<div class="col-sm-12">
					<button type="button" class="btn btn-blue pull-right" id="insert" style="margin-left: 15px;">
			        	<?php echo lang('BTN_SAVE');?>
			        </button>
					<a href="<?php echo base_url('portfolio-student'); ?>"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">
			        	<?php echo lang('BTN_CANCEL');?>
			        </button></a>
			        
				</div>
				
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var user_id = '<?php echo $this->session->userdata['user_id'];?>';
		$('.attachment').filestyle({
			buttonName : 'btn-info  btn',
			buttonText: 'เลือกไฟล์'
		});
		 
		$('#issuedDate').datetimepicker({
		 	format: "DD-MM-YYYY",
		 	defaultDate: new Date()
		});

		var formpast = true

		// ### check validate title
		$('#insert-modal [name="title"]').blur(function(event) {
			validTitle();
		});
		$('#insert-modal [name="title"]').keydown(function(event) {
			formpast = true
			$('#error-title').hide();
		});
		$('#insert-modal [name="attachment"]').blur(function(event) {
			validAttachments();		
		});

		$('.insert-modal').click(function(event) {
			$('#insert-modal [name="issuedDate"]').val( FormatDT(new Date()) );
			$('#insert-modal [name="title"]').val('');
			$('#insert-modal [name="detail"]').val('');
			$('#insert-modal [name="stdPortId"]').val('');
			$('#insert-modal [name="portTypeId"]').val('1');
			$('#insert-modal [name="title"]').focus();
			$('#insert-modal [name="portLvId"]').focus();
			$('.attFilePath').hide();
		});

		$('#insert').click(function(event) {
			formpastTitle = validTitle();
			formpastAtt = validAttachments('upd');
			
			var data = new FormData();
			for (var i = 0; i < $('#input-attachment').children().length; i++) {
				if ($('#Path-'+(i+1)) && $('#Path-'+(i+1)).attr('href') == '') {
					console.log('if: '+(i+1));
				}
				else{
					data.append('attachment'+i, $('#insert-modal [name="attachment'+(i+1)+'"]')[0].files[0]);
					console.log('else: '+(i+1));
				}
			}
			data.append('lang', '<?php echo $lang?>');
			data.append('issuedDate', $('#insert-modal [name="issuedDate"]').val());
			data.append('portTypeId', $('#insert-modal [name="portTypeId"]').val());
			data.append('title', $('#insert-modal [name="title"]').val());
			data.append('detail', $('#insert-modal [name="detail"]').val());
			data.append('stdPortId', $('#insert-modal [name="stdPortId"]').val());
			data.append('portLvId', $('#insert-modal [name="portLvId"]').val());
			data.append('token', btoa(user_id) );
			if(formpastTitle && formpastAtt){
				LoadingPage();
				$.ajax({
				    url: "<?php echo $_server?>updStudentPortfolio.do",
				    data: data,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(data){
				    	console.log(data);
				    	if(data.responseCode == 200){
				    		window.location = '<?php echo base_url("portfolio-student");?>'; 
				    	}
					}
				});
			}
		});
		var i = 1;

		var api = $.post('<?php echo $_server?>getStudentPortfolioDtl.do?stdPortId=<?php echo $this->input->get("stdPortId"); ?>');
		api.done(function( data ) {
			console.log(data);
			if(data.responseCode == 200){
				PortDtl = data.data
				$('#insert-modal [name="title"]').val(PortDtl.title);
				$('#insert-modal [name="portTypeId"]').val(PortDtl.portTypeId);
				$('#insert-modal [name="portLvId"]').val(PortDtl.portLvId);
				$('#insert-modal [name="issuedDate"]').val(FormatDT(PortDtl.issuedDate));
				$('#insert-modal [name="detail"]').val(PortDtl.detail);
				$('#insert-modal [name="portTypeOther"]').val(PortDtl.portTypeOther);
				if(PortDtl.portTypeOther){
					$('#portTypeOther').show();
				}
				$('#input-attachment').html('');
				for (var i = 0; i < PortDtl.portFileList.length; i++) {
					disabled = (PortDtl.portFileList.length ==1)? "disabled" :"";
					
					txtRemove= 	'<div class="col-sm-2 text-right">'+
									'<button type="button" class="btn btn-blue" onclick="delClass('+PortDtl.portFileList[i].portFileId+')" id="remove-file" '+ disabled +'>'+
							        	'<?php echo lang('REMOVE_FILE'); ?>'+
							        '</button>'+
								'</div>';
					// if(i==0){
					// 	txtRemove = '<div class="col-sm-2 ">'+
					// 					'<button type="button" class="btn btn-blue" id="add-file">'+
					// 			        	'<?php echo lang('ADD_FILE'); ?>'+
					// 			        '</button>'+
					// 				'</div>';
					// }

					text ='<div class="form-group class-attachment-'+(i+1)+'">'+
						'<label class="col-sm-2 control-label text-right">'+
							'<?php echo lang('FORM_PORT_SHEET')?> : <span class="text-red"> *</span>'+
						'</label>'+

						'<div class="col-sm-8 hidden">'+
							'<input type="file" class="attachment" name="attachment'+(i+1)+'">'+
						'</div>'+
						'<div class="col-sm-6 attFilePath">'+
							'<a id="Path-'+i+'" href="'+PortDtl.portFileList[i].attFilePath+'" target="_blank" >'+
								'<?php echo lang('DOWNLOAD').' '.lang('FORM_PORT_SHEET')?>'+
							'</a>'+
						'</div>'+
						txtRemove+
					'</div>';
					$('#input-attachment').append(text);
				}
				
				$('.attachment').filestyle({
					buttonName : 'btn-info  btn',
					buttonText: 'เลือกไฟล์'

				});
				
				$('#add-file').click(function(event) {
					text ='<div class="form-group class-attachment-'+i+'">'+
								'<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_SHEET');?> : <span class="text-red"> *</span></label>'+
								'<div class="col-sm-8">'+
									'<input type="file" class="attachment" name="attachment'+(i+1)+'">'+
								'</div>'+
								'<div class="col-sm-7">'+
									'<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>'+
								'</div>'+
							'</div>';

					$('#input-attachment').append(text);
					$('.attachment').filestyle({
						buttonName : 'btn-info  btn',
						buttonText: 'เลือกไฟล์'
					});
					i++
				});
			}
		});
	});
	function delClass(portFileId){
		LoadingPage();
		var api = $.post('<?php echo $_server?>delPortfolioFile.do?portFileId='+portFileId);
		api.done(function( data ) {
			if(data.responseCode==200) location.reload();
		});
	}

	// function UpdatePortfolio(stdPortId) {
	// 	var api = $.post('<?php echo $_server?>getStudentPortfolioDtl.do?stdPortId='+stdPortId);
	// 	api.done(function( data ) {
	// 		console.log(data);
	// 		StudentPortfolioDtl = data.data;
	// 		$( ".attFilePath" ).hide();
	// 		$( "#error-attachment" ).hide();
	// 		$('#insert-modal [name="issuedDate"]').val(StudentPortfolioDtl.issuedDate);
	// 		$('#insert-modal [name="title"]').val(StudentPortfolioDtl.title);
	// 		$('#insert-modal [name="detail"]').val(StudentPortfolioDtl.detail);
	// 		$('#insert-modal [name="stdPortId"]').val(StudentPortfolioDtl.stdPortId);
	// 		$('#insert-modal [name="portLvId"]').val(StudentPortfolioDtl.portLvId);
	// 		if(StudentPortfolioDtl.attFilePath){
	// 			$( ".attFilePath" ).html('<a href="'+StudentPortfolioDtl.attFilePath+'" target="_blank" ><?php echo lang('DOWNLOAD').' '.lang('FORM_PORT_SHEET');?></a>').show();
	// 		}
	// 		$('#insert-modal [name="portTypeId"]').val(StudentPortfolioDtl.portTypeId);
	// 		var issuedDate = FormatDT (StudentPortfolioDtl.issuedDate);
	// 		$('#issuedDate .form-control').val(issuedDate)
	// 	});
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
		
	function removePort(stdPortId){
		console.log(stdPortId);
		var api = $.post('<?php echo $_server?>delStudentPortfolio.do?',{stdPortId: stdPortId , lang:'<?php echo $lang?>'});
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}
</script>

