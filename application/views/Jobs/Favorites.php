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
				<h3><?php echo lang('STUDENT_MENU_JOB_PORTFOLIO'); ?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2 style="display: inline-block;"><?php echo lang('POSITION_LIST') ?></h2>
					
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('ADD_POSITION_POSITION') ?></th>
								<th><?php echo lang('FORM_SWORK_COMPANY') ?></th>
								<th><?php echo lang('FORM_PROVINCE') ?></th>
								<th><?php echo lang('TABLE_POSITION_COUNT') ?></th>
								<th><?php echo lang('MAIN_JOB_SALARY') ?></th>
								<th></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="col-sm-12 JobLists"></div>
				<div class="col-sm-12">
					<div class="pull-left" id="pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>

<script>
	$(document).ready(function() {
		LoadingPage();
		var user_id = '<?php echo $userdata['user_id'];?>';
		$('.interact').tooltipster({
			contentAsHTML: true,
			interactive: true,
			theme: 'tooltipster-light'
		});
		var limit = 10;
		var parameters ={
			limit : limit,
			token : btoa(user_id),
			lang :'<?php echo $lang ?>' 
		}
		console.log(btoa(user_id));
		var api = $.post( '<?php echo $_server?>../job/api/getFavoriteJobList.do?',parameters);
		api.done(function( data ) {
			checkError = checkError('',data.data.length,'<?php echo lang('ERROR_ALRET') ?>');
			if(checkError == 'Error') return false;
			totalPages = Math.ceil(data.recordsTotal/limit);
			var pag = $('#pagination').simplePaginator({
				totalPages: (totalPages==0)? 1 : totalPages,
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameters.page = page;
					var api = $.post('<?php echo $_server?>../job/api/getFavoriteJobList.do?',parameters);
					api.done(function( data ) {
						$('.JobLists').html('');
						$('tbody').html('');
						JobLists = data.data;
						for (i = 0; i < data.recordsFiltered; i++) { 
							tbody = '<tr>'+
										'<td>'+
											'<a href="<?php echo site_url();?>jobdetail?jobId='+JobLists[i].jobId+'" target="_blank" class="interact">'+
													JobLists[i].position+
											'</a> '+
										'</td>'+
										'<td>'+JobLists[i].corpName+' </td>'+
										'<td>'+JobLists[i].provinceName+'</td>'+
										'<td>'+ JobLists[i].positionCount +'</td>'+
										'<td>'+JobLists[i].salary+'</td>'+
										'<td>'+										
											' <i class="fa fa-trash interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class=&#39;label label-danger pointer&#39; onclick=&#39;deleteFav('+JobLists[i].jobId+')&#39; &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"></i>'+
										'</td>'+
									'</tr>';
				   			$('tbody').append(tbody);
				   			// UnLoadingPage();
				   			tooltipster();
						}
				   		UnLoadingPage();
					});
					// 
				}
			});
			UnLoadingPage();
		});
	});
	function deleteFav(jobId){
		LoadingPage();
		var user_id = '<?php echo $this->session->userdata['user_id'];?>';
		parameters={
			jobId:jobId, 
			lang:'<?php echo $lang;?>',
			token: btoa(user_id),
		}
		var removeFav = $.post( '<?php echo $_server?>../job/api/removeFavoriteJob.do',parameters);
		removeFav.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
		});
	}
</script>