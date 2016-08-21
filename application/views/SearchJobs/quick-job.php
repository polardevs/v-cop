<div class="container body-student">
	<div class="row">
		<div class="col-sm-3">
			<div class="bg-info hidden-xs">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9" style="border-left: 2px solid #ccc">
			<div class="bg-gray">
				<h3>
					<?php echo lang('STUDENT_MENU_INTERESING_QUICK_JOB'); ?>
				</h3>
			</div>
			<div class="row">
				<form name="quick-search" id="quick-search" method="POST" action ="<?php echo base_url()?>quick-job"  enctype="multipart/form-data">
					<div class="col-sm-12">
						<h3 style="display: inline-block;"><?php echo lang('Q_JOB_LIST'); ?> 
							<co class="recordsTotal"></co> <?php echo lang('FORM_POSITION'); ?> 
						</h3>
						<hr style="margin-top: 5px;">
					</div>
					<div class="col-sm-3">
						<select class="form-control btn-info" name="jobTypeId">
							<option value=""><?php echo lang('MAIN_JOB_TYPE') ?></option>
						<?php 
							foreach ($JobType as $JobTypes) {
								echo "<option value='".$JobTypes->jobTypeId."'>";
								echo $JobTypes->name;
								echo "</option>";
							}
						?>
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control btn-info" name="startDateSort">
							<option value="desc"><?php echo lang('RESULT_DESC') ?></option>
							<option value="asc"><?php echo lang('RESULT_ASC') ?></option>
							
						</select>
					</div>
					<div class="col-sm-6" style="padding-bottom: 20px;">
						<div class="input-group">
							<input type="text" class="form-control" id="exampleInputAmount" placeholder="--<?php echo lang('Q_JOB_SEARCH');?>--" name="keyword">
							<div class="input-group-addon" id="search" style="background-color: #999; color: #fff;"><?php echo lang('BTN_SEARCH'); ?></div>
						</div>
					</div>
				</form>
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
		var limit= 10;
		var parameter = {
			urgentFlg: 'y',
			startDateEn: 'y',
			statusId: 1,
			limit: limit,
		}
		var api = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
		api.done(function( data ) {
			$('.recordsTotal').html('"'+data.recordsFiltered+'"');
			resultJobs(parameter,limit,data.recordsFiltered);
		});

		$('#search').click(function(event) {
			LoadingPage();
			$('#pagination').children().remove();
			$('#JobLists').children().remove();
			var parameter={
				jobTypeId: $("select[name='jobTypeId']").val(),
				keyword: $("input[name='keyword']").val(),
				startDateSort: $("select[name='startDateSort']").val(),
				urgentFlg: 'y',
				startDateEn: 'y',
				limit: limit,
			}
			var api = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
			api.done(function( data ) {
				$('.recordsTotal').html(data.recordsFiltered);
				resultJobs(parameter,limit,data.recordsFiltered);
				
			});
	 	});
	});
	function resultJobs(parameter,limit,recordsTotal) {
		totalPages = Math.ceil(recordsTotal/limit);
		var pag = $('#pagination').simplePaginator({
			totalPages: (totalPages ==0)? 1 : totalPages,
			nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
			prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
			firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
			lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
			pageChange: function(page) {
				parameter.page = page;
				var getJobList = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
				getJobList.done(function( data ) {
					if(!data.recordsFiltered >0){
						$('#pagination').hide();
					}
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
			   			UnLoadingPage();
					}
				});
			}
		});
	}
</script>