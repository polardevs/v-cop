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
					<h3 style="display: inline-block;">
						<?php echo lang('STUDENT_PORTFOLIO_LIST');?>
					</h3>
					<a href="<?php echo base_url('portfolio-student/add'); ?>">
						<button class="btn-blue btn center-block pull-right hidden-xs" style="margin-top: 15px;">
							<?php echo lang('BTN_ADD_PORT');?>
						</button>
					</a>
					<a href="<?php echo base_url('portfolio-student/add'); ?>">
						<button class="btn-blue btn center-block pull-right visible-xs" style="margin-top: 15px;">
							+
						</button>
					</a>
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('FORM_PORT_NAME')?></th>
								<th><?php echo lang('FORM_PORT_TYPE')?></th>
								<th><?php echo lang('FORM_PORT_DATE')?></th>
								<th class="text-center">ระดับคะแนน</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($StudentPortfolio->data as $StudentPortfolios) {
							switch ($StudentPortfolios->point) {
								case '0':
									$point = 'รอการประเมิน';
									break;
								case '1':
									$point = '<i class="fa fa-star" style="color:#C87533"></i>';
									break;
								case '2':
									$point = '<i class="fa fa-star" style="color:#C0C0C0"></i>';
									break;
								case '3':
									$point = '<i class="fa fa-star" style="color:#FFD700"></i>';
									break;
							}
						?>
							<tr>
								<td><?php echo $StudentPortfolios->title;?></td>
								<td><?php echo $StudentPortfolios->portTypeName;?></td>
								<td>
									<?php 
									if($date=$StudentPortfolios->issuedDate){
										echo date('d-m-Y', strtotime($date=$StudentPortfolios->issuedDate));
									}
									?>
								</td>
								<td class="text-center"><?php echo $point;?></td>
								<td class="text-center">
									<a href="portfolio-student/Upd?stdPortId=<?php echo $StudentPortfolios->stdPortId;?>" data-toggle="tooltip" title="แก้ไขข้อมูล" class="none-decoration">
										<i class="fa fa-pencil-square-o text-blue"></i> 
									</a>
									
									<span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class='label label-danger pointer' onclick='removePort(<?php echo $StudentPortfolios->stdPortId;?>)' &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>
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
			validAttachment();		
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
			formpastAtt = validAttachment();
			var data = new FormData();
			data.append('attachment', $('#insert-modal [name="attachment"]')[0].files[0]);
			data.append('lang', '<?php echo $lang?>');
			data.append('issuedDate', $('#insert-modal [name="issuedDate"]').val());
			data.append('portTypeId', $('#insert-modal [name="portTypeId"]').val());
			data.append('title', $('#insert-modal [name="title"]').val());
			data.append('detail', $('#insert-modal [name="detail"]').val());
			data.append('stdPortId', $('#insert-modal [name="stdPortId"]').val());
			data.append('portLvId', $('#insert-modal [name="portLvId"]').val());
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
				    		location.reload();
				    	}
					}
				});
				$('#insert-modal').modal('hide');
			}
		});
	});

	function UpdatePortfolio(stdPortId) {
		var api = $.post('<?php echo $_server?>getStudentPortfolioDtl.do?stdPortId='+stdPortId);
		api.done(function( data ) {
			console.log(data);
			StudentPortfolioDtl = data.data;
			$( ".attFilePath" ).hide();
			$( "#error-attachment" ).hide();
			$('#insert-modal [name="issuedDate"]').val(StudentPortfolioDtl.issuedDate);
			$('#insert-modal [name="title"]').val(StudentPortfolioDtl.title);
			$('#insert-modal [name="detail"]').val(StudentPortfolioDtl.detail);
			$('#insert-modal [name="stdPortId"]').val(StudentPortfolioDtl.stdPortId);
			$('#insert-modal [name="portLvId"]').val(StudentPortfolioDtl.portLvId);
			if(StudentPortfolioDtl.attFilePath){
				$( ".attFilePath" ).html('<a href="'+StudentPortfolioDtl.attFilePath+'" target="_blank" ><?php echo lang('DOWNLOAD').' '.lang('FORM_PORT_SHEET');?></a>').show();
			}
			$('#insert-modal [name="portTypeId"]').val(StudentPortfolioDtl.portTypeId);
			var issuedDate = FormatDT (StudentPortfolioDtl.issuedDate);
			$('#issuedDate .form-control').val(issuedDate)
		});
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
		var user_id = '<?php echo $userdata['user_id'];?>';
		parameters = {
			stdPortId : stdPortId,
			lang : '<?php echo $lang?>',
			token : btoa(user_id)
		}
		var api = $.post('<?php echo $_server?>delStudentPortfolio.do?',parameters);
		api.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}
</script>

