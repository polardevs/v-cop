<div class="container body-student">
	<div class="row">
		<div class="col-sm-3">
			<div class="bg-info hidden-xs">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9"  style="border-left: 2px solid #ccc">
			<div class="bg-gray">
				<h3><?php echo lang('STUDENT_MENU_JOB_FIND');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12 ">
					<div class="col-sm-12 sJob" style="padding: 15px;">
						<form name="search" id="search" method="POST">
							<?php  $this->load->view('/SearchJobs/FormSearchJobs'); ?>
						</form>
					</div>
					

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 find" id="result-student">
					<h2 style="display: inline-block;">
						<?php echo lang('SEARCH_RESULT') ?> <span class="p1"></span> <?php echo lang('LIST') ?>
					</h2>
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12 find" id="result-not-found" style="display: none;">
					<h2 style="display: inline-block;">
						<?php echo lang('NONE_RESULT') ?>
					</h2>
					<hr style="margin-top: 5px;">
				</div>
			</div>
			<div class="row">
				<div id="JobList"></div>
				<div class="col-sm-12">
					<div id="pagination" class="pull-left"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		$('#result-not-found').hide();
		$('#result-student').hide();
		var limit= 10;

		var parameter={
			statusId: 1,
			startDateEn: 'y',
			limit: limit,
		}
		resultJobs('',parameter);

		$( "#find" ).click(function() {
			LoadingPage();
			$('#pagination').children().remove();
			$('.JobLists').children().remove();

			var parameter={
				jobTypeId: $("select[name='jobTypeId']").val(),
				keyword: $("input[name='keyword']").val(),
				levelId: $("select[name='levelId']").val(),
				provinceId: $("select[name='provinceId']").val(),
				statusId: 1,
				startDateEn: 'y',
				limit: limit,
			}
			parameter.provinceId  = (parameter.provinceId == -1)? '':parameter.provinceId;
			resultJobs('searched',parameter);
		});
	});

	function resultJobs(stage , parameter){
		if(stage == 'searched'){
			parameter.limit = 10;
		}
		var api = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
		api.done(function( data ) {
			$('#JobList').html('');
			$('#pagination').html('');
			totalPages = Math.ceil(data.recordsFiltered/parameter.limit);
			if (totalPages <=0){
				$('#result-student').hide();
				$('#result-not-found').show();
				UnLoadingPage();

			}else{
				$('#result-student').show();
				$('#result-not-found').hide();
				if(stage != 'searched'){
					$('.p1').html('"'+data.data.length+'"');
					$('#pagination').hide();
					for (i = 1; i < 10 ; i++) { 
						JobLists = data.data[i];
						p = {
							base_url: '<?php echo base_url() ?>',
							URGENT:'<?php echo lang('URGENT') ?>',
							FORM_PROVINCE:'<?php echo lang('FORM_PROVINCE') ?>',
							STARTDATE:'<?php echo lang('FORM_ADD_POSITION_STARTDATE') ?>',
							AMOUNT:'<?php echo lang('AMOUNT') ?>',
							POSITION_COUNT:'<?php echo lang('TABLE_POSITION_COUNT') ?>',
							FORM_SWORK_SALARY:'<?php echo lang('FORM_SWORK_SALARY') ?>',
							FORM_PORT_DESC:'<?php echo lang('FORM_PORT_DESC') ?>',
							ARTICLE_VIEW:'<?php echo lang('ARTICLE_VIEW') ?>',
						}
						JobList = JobList12(JobLists,p);
			   			$('#JobList').append(JobList);
					}
					UnLoadingPage();

				}
				else{
					$('.p1').html('"'+data.recordsFiltered+'"');
					$('#pagination').show();
					var pag = $('#pagination').simplePaginator({
						totalPages: Math.ceil(data.recordsFiltered/parameter.limit),
						nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
						prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
						firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
						lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
						pageChange: function(page) {
							parameter.page = page;
							var getJobList = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
							getJobList.done(function( data ) {
								$('#JobList').html('');
								for (i = 0; i < data.recordsFiltered; i++) { 
									JobLists = data.data[i];
									p = {
										base_url: '<?php echo base_url() ?>',
										URGENT:'<?php echo lang('URGENT') ?>',
										FORM_PROVINCE:'<?php echo lang('FORM_PROVINCE') ?>',
										STARTDATE:'<?php echo lang('FORM_ADD_POSITION_STARTDATE') ?>',
										AMOUNT:'<?php echo lang('AMOUNT') ?>',
										POSITION_COUNT:'<?php echo lang('TABLE_POSITION_COUNT') ?>',
										FORM_SWORK_SALARY:'<?php echo lang('FORM_SWORK_SALARY') ?>',
										FORM_PORT_DESC:'<?php echo lang('FORM_PORT_DESC') ?>',
										ARTICLE_VIEW:'<?php echo lang('ARTICLE_VIEW') ?>',
									}
									JobList = JobList12(JobLists,p);
						   			$('#JobList').append(JobList);
								}
							});
							UnLoadingPage();
						}
					});
				}
			}
		});

	}
</script>