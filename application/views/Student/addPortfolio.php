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
				<h3><?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-horizontal" id="insert-modal">
			    		<input type="hidden" class="form-control" name="stdPortId">
						<div class="form-group">
							<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_NAME');?> :<span class="text-red"> *</span></label>
							<div class="col-sm-8"><input type="text" class="form-control" name="title"></div>
							<div class="col-sm-8 error" id="error-title" style="display:none;"></div>
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
						<div id="input-attachment">							
							<div class="form-group">
								<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_SHEET');?> : <span class="text-red"> *</span></label>
								<div class="col-sm-8">
									<input type="file" class="attachment" name="attachment1">
								</div>

								<div class="col-sm-2 ">
									<button type="button" class="btn btn-blue" id="add-file">
							        	<?php echo lang('ADD_FILE'); ?>
							        </button>
								</div>

								<div class="col-sm-7 col-sm-offset-2">
									<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>
								</div>

							</div>
						</div>
						<div id="error-attachment" class="col-sm-8 col-sm-offset-2 error"></div>
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
			validAttachmentPort();		
		});

		$('#insert-modal [name="portTypeId"]').change(function(event) {
			portTypeId = $('#insert-modal [name="portTypeId"]').val();
			if(portTypeId == 99){
				$('#portTypeOther').show();
			}
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
			formpastAtt = validAttachmentPort();
			
			var data = new FormData();
			for (var i = 1; i <= $('#input-attachment').children().length; i++) {
				data.append('attachment'+i, $('#insert-modal [name="attachment'+i+'"]')[0].files[0]);
			}
			data.append('lang', '<?php echo $lang?>');
			data.append('issuedDate', $('#insert-modal [name="issuedDate"]').val());
			data.append('portTypeId', $('#insert-modal [name="portTypeId"]').val());
			data.append('title', $('#insert-modal [name="title"]').val());
			data.append('detail', $('#insert-modal [name="detail"]').val());
			data.append('stdPortId', $('#insert-modal [name="stdPortId"]').val());
			data.append('portLvId', $('#insert-modal [name="portLvId"]').val());
			data.append('portTypeOther', $('#insert-modal [name="portTypeOther"]').val());
			data.append('token', btoa(user_id) );

			if(formpastTitle && formpastAtt){
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
				    		console.log(data);
				    		window.location='<?php echo base_url("portfolio-student");?>'; 
				    	}
					}
				});
			}
		});
		var i = 1;
		$('#add-file').click(function(event) {
			i++
			text = '';
			text +='<div class="form-group class-attachment-'+i+'">'+
						'<label class="col-sm-2 control-label text-right"><?php echo lang('FORM_PORT_SHEET');?> : <span class="text-red"> *</span></label>'+
						'<div class="col-sm-8">'+
							'<input type="file" class="attachment" name="attachment'+i+'">'+
						'</div>'+
						'<div class="col-sm-8">'+
							'<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>'+
						'</div>'+
					'</div>';
			$('#input-attachment').append(text);
			$('.attachment').filestyle({
				buttonName : 'btn-info  btn'
			});
		});
	});
	function validAttachmentPort(upd){
	if(upd!='upd'){
		for (var i = 1; i <= $('#input-attachment').children().length; i++) {
			filetype = $('#insert-modal [name="attachment'+i+'"]')[0].files[0];
			if(filetype){
				if(filetype.type == 'application/pdf' || filetype.type == 'image/png' || filetype.type == 'image/jpeg') {
					formpast = true;
					$('#error-attachment').hide();
				}
				else{
					$('#error-attachment').html('<b>โปรดเลือกไฟล์ที่นามสกุล .pdf, .png, .jpg หรือ .jpeg เท่านั้น</b>').show();
					formpast = false;
				}
			}
			else if(formpast){
				formpast = true;
				$('#error-attachment').hide();
			}
			else{
				$('#error-attachment').html('<b>เพิ่มประกาศ, เกียรติบัตรหรือเอกสารอื่นๆที่อ้างอิงได้ เพื่อประกอบความน่าเชื่อถือ</b>').show();
				formpast = false;
			}
		}
	}
	return formpast;
}
	function delClass(className){
		$( "."+className).remove();
	}

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
		var parameters={
			stdPortId: stdPortId,
			lang:'<?php echo $lang?>',
			userId: user_id
		}

		var api = $.post('<?php echo $_server?>delStudentPortfolio.do?',parameters);
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}
</script>

