<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="inline-block"><?php echo lang('COMPANY_MENU_POSITION');?></h2>
					<div class="pull-right margin-t-20">
						<div class="appFilePath inline-block text-danger"></div>
						<a href="<?php echo site_url();?>position/add">
							<button class="btn btn-blue  btn-appFilePath">
								<?php echo lang('ADD_POSITION');?>
							</button>
						</a>
					</div>
					<hr>
				</div>
				<div class="col-sm-12 table-responsive" style="padding-top: 15px;">
					<table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo lang('ADD_POSITION_POSITION');?></th>
								<!-- <th class="text-center"><?php echo lang('TABLE_POSITION_COUNT');?></th> -->
								<th class="text-center"><?php echo lang('TABLE_POSITION_APP');?></th>
								<th><?php echo lang('TEABLE_CON_TYPE');?></option></th>
								<th class="text-center"><?php echo lang('FORM_GRADE');?></th>
								<!-- <th><?php echo lang('FORM_ADD_POSITION_STARTDATE');?></th> -->
								<th><?php echo lang('FORM_ADD_POSITION_ENDDATE');?></th>
								<th class="text-center"><?php echo lang('FORM_ADD_POSITION_STATUS');?></th>
								<th class="text-center">ประกาศ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<div class="col-sm-12" id="pagination"></div>
					<div class="col-sm-12" id="none-announce" style="display: none;">
						<h4 class="text-center">ไม่มีการประกาศสมัครงาน</h4>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		LoadingPage();
		var user_id = '<?php echo $userdata['user_id'];?>';
		var limit= 10;
		var parameter = {
			corpId: '<?php echo $_corpId; ?>',
			limit: limit,
			lang: '<?php echo $lang ;?>',
			token: btoa(user_id)
		}
		var api = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
		api.done(function( data ) {
			console.log(data);
			checkError = checkError(data.responseCode,data.data.length,'<?php echo lang('ERROR_ALRET') ?>');
			if(checkError == 'Error') return false;

			totalPages = (data.recordsTotal == 0)? 1 : Math.ceil(data.recordsTotal/limit);
			var pag = $('#pagination').simplePaginator({
				totalPages: totalPages,
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getJobList = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
					getJobList.done(function( data ) {
						console.log(data);
						if(data.data.length < 1){
							$('#DataTable').hide();
							$('#pagination').hide();
							$('#none-announce').show();
						}
						$('tbody').html('');
						for (i = 0; i <= data.recordsFiltered; i++) { 
							JobLists = data.data[i];
							if(JobLists.onTimeFlg == 1){
								onTimeFlg = "<div class='status label-success'>"+
												"<?php echo lang('TIME_PUBLISH'); ?>"+
											"</div>"; 
							}else{
								onTimeFlg = "<div class='status label-danger'>"+
												"<?php echo lang('TIME_OUT_PUBLISH'); ?>"+
											"</div>"; 
							}
							if(JobLists.statusId == 1){
								status = "<div class='status label-success'>"+
											"<?php echo lang('PUBLISH'); ?>"+
										"</div>"; 
							}
							else{
								status ="<div class='status label-danger'>"+
											"<?php echo lang('UNPUBLISH') ?>"+
										"</div>";
							}
							
							text = 	'<tr>'+
										'<td>'+ JobLists.position +'</td>'+
										'<td class="text-center">'+ 
											'<a href="<?php site_url();?>position/company-apprentice?jobId='+ JobLists.jobId +'">'+
												JobLists.appCount +' / '+ JobLists.positionCount +
											'</a>'+
										'</td>'+
										// '<td class="text-center"><a href="<?php site_url();?>position/company-apprentice?jobId='+ JobLists.jobId +'">'+ JobLists.appCount +'</a></td>'+
										'<td>'+ JobLists.jobTypeName +'</td>'+
										'<td>'+ JobLists.levelName +'</td>'+
										
										// '<td>'+ FormatDT(JobLists.startDate) +'</td>'+
										'<td>'+ FormatDT(JobLists.endDate) +'</td>'+
										'<td class="text-center">'+ status +'</td>'+
										'<td class="text-center">'+ onTimeFlg +'</td>'+
										'<td class="text-center">'+
											'<a href="<?php echo site_url();?>position/update?jobId='+ JobLists.jobId +'" data-toggle="tooltip" title="ติดต่อผู้สมัคร">'+
												'<i class="fa fa-pencil-square-o text-blue"></i>'+
											'</a> '+
											' <span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class=&#39;label label-danger pointer&#39; onclick=&#39;delJob('+JobLists.jobId+')&#39; &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>'+
										'</td>'+
									'</tr>';
			   				$('tbody').append(text);
			   				UnLoadingPage();
							$('[data-toggle="tooltip"]').tooltip();
				   			tooltipster();
						}
					});
					UnLoadingPage();
				}
			});
		});
	});
	function delJob(jobId) {
		LoadingPage();
		var user_id = '<?php echo $this->session->userdata['user_id'];?>';
		var parameters ={
			jobId: jobId, 
			lang: "<?php echo $lang;?>",
			token: btoa(user_id)
		}
		var api = $.post( '<?php echo $_server?>../job/api/delJob.do?',parameters);
		api.done(function( data ) {
			if (data.responseCode == 200){
				UnLoadingPage();
				location.reload();
			}
		});
	}
</script>