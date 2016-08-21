<div class="container container-body">
	<div class="row">
		<div class="col-sm-12">
			<form name="search" class="s-Job" id="search" method="POST" action ="<?php echo base_url()?>sjobs"  enctype="multipart/form-data">
				<?php  $this->load->view('/SearchJobs/FormSearch'); ?>
			</form>
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

<script>
	$(document).ready(function() {
		LoadingPage();
		var limit = 10;
		if('<?php echo($this->input->post("post")) ;?>'){
			$("input[name='keyword']").val('<?php echo $this->input->post("keyword")?>');
			$("select[name='provinceId']").val('<?php echo $this->input->post("provinceId")?>');
			$("select[name='jobTypeId']").val('<?php echo $this->input->post("jobTypeId")?>');
			$("select[name='levelId']").val('<?php echo $this->input->post("levelId")?>');

			var parameter ={
				keyword : '<?php echo $this->input->post("keyword")?>',
				provinceId : '<?php echo $this->input->post("provinceId")?>',
				jobTypeId : '<?php echo $this->input->post("jobTypeId")?>',
				levelId : '<?php echo $this->input->post("levelId")?>',
				startDateEn: 'y',
				statusId: 1,
				limit: limit
			}
			parameter.provinceId  = (parameter.provinceId == -1)? '':parameter.provinceId;
			resultJobs(parameter);
		}
		$('.search').click(function(event) {
			LoadingPage();
			var parameter ={
				startDateEn: 'y',
				limit: limit
			}
			var submit = $( "form#search").serializeArray();
			for (var i = 0; i < submit.length; i++) {
				parameter[submit[i].name] = submit[i].value;
			}
			resultJobs(parameter);
		});
	});
	
	function resultJobs(parameter){
		console.log(parameter)
		var api = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
		api.done(function( data ) {
			$('#JobList').html('');
			$('#pagination').html('');
			totalPages = Math.ceil(data.recordsFiltered/parameter.limit);
			if (totalPages <=0){
				$('#result-student').hide();
				$('#result-not-found').show();
			}else{
				$('#result-student').show();
				$('#result-not-found').hide();
				$('.p1').html('"'+data.recordsFiltered+'"');
				var pag = $('#pagination').simplePaginator({
					totalPages: totalPages,
					nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
					prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
					firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
					lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
					pageChange: function(page) {
						$('#JobList').html('');
						parameter.page = page;
						var JobList = $.post( '<?php echo $_server?>../job/api/getJobList.do',parameter);
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
						JobList.done(function( data ) {
							for (i = 0; i < data.data.length; i++) { 
								JobLists = data.data[i];
								JobList = JobList12(JobLists,p);
			   					$('#JobList').append(JobList);
							}
						});
					}
				});
			}
			UnLoadingPage();
		});
	}
</script>