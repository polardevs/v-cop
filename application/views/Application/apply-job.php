<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/css/toggle-switch.css">
<div class="container body-student">
	<div>
	<div class="row">
		<div class="col-sm-3" style="border-right: 2px solid #ccc">
			<div class="bg-info hidden-xs">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9">
			<div class="bg-gray">
				<h3><?php echo lang('STUDENT_MENU_JOB_APPLY_JOB');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2 style="display: inline-block;"><?php echo lang('POSITION_LIST') ?></h2>
					
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table id="example" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('ADD_POSITION_POSITION') ?></th>
								<th><?php echo lang('FORM_SWORK_COMPANY') ?></th>
								<th><?php echo lang('APPLICATION_DATE') ?></th>
								<th><?php echo lang('FORM_ADD_POSITION_STATUS') ?></th>
								<!-- <th><?php echo lang('FORM_ADD_POSITION_STATUS') ?></th> -->
								<th>การจับคู่งาน</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="pull-left" id="pagination"></div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		var limit= 10;
		var parameter = {
			userId: '<?php echo $userdata['user_id']; ?>',
			limit: limit,
			regByStudentFlg:'y',
			lang: '<?php echo $lang ;?>'
		}
		var api = $.post( '<?php echo $_server?>../jobapplication/api/getJobListForStd.do',parameter);
		api.done(function( data ) {
			checkError = checkError(data.responseCode,data.data.dataList.length,'<?php echo lang('ERROR_ALRET') ?>');
			if(checkError == 'Error') return false;

			totalPages = (data.data.recordsTotal == 0)? 1 : Math.ceil(data.data.recordsTotal/limit);
			var pag = $('#pagination').simplePaginator({
				totalPages: totalPages,
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getJobList = $.post( '<?php echo $_server?>../jobapplication/api/getJobListForStd.do',parameter);
					getJobList.done(function( data ) {
						if(data.data.dataList.length ==0){
			   				UnLoadingPage();
						}
						$('tbody').html('');
						for (i = 0; i < data.data.recordsFiltered; i++) { 
							JobLists = data.data.dataList[i];
							checkedy='';
							checkedn='';
							if(JobLists.matchingStatusFlg == 'y ') checkedy = 'checked';
							if(JobLists.matchingStatusFlg == 'n ') checkedn = 'checked';
							console.log(JobLists);
							text = 	'<tr>'+
										'<td>'+
											'<a href="javascript:PostJobdetail('+JobLists.jobId+','+JobLists.appId+','+JobLists.userId+')" target="_bank">'+ JobLists.position +'</a>'+
										'</td>'+
										'<td>'+ JobLists.corpName +'</td>'+
										'<td>'+ FormatDT(JobLists.registerDate) +'</td>'+
										'<td>'+ JobLists.appStatusName +'</td>'+
										'<td>'+
											'<div class="checkbox inline-block">'+
  												'<label>'+
  													'<input type="checkbox" name="y-'+JobLists.appId+'" onclick="changeFlg(\'y\','+JobLists.appId+')" '+checkedy+'><?php echo lang('STATUS_ALREADY') ?>'+
  												'</label>'+
											'</div>'+
											'<div class="checkbox inline-block">'+
  												'<label style="padding-left:10px;">'+
  													'<input type="checkbox" name="n-'+JobLists.appId+'" onclick="changeFlg(\'n\','+JobLists.appId+')" '+checkedn+'><?php echo lang('STATUS_NOT_YET') ?>'+
  												'</label>'+
											'</div>'+
      									'</td>'+
      									'<td class="text-center">'+
      									' <span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class=&#39;label label-danger pointer&#39; onclick=&#39;delJob('+JobLists.appId+')&#39; &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>'+
      									'</td>'+
									'</tr>';
			   				$('tbody').append(text);
			   				UnLoadingPage();
						}
						tooltipster();
					});
				}
			});
		});
	});
	
	function changeFlg(matchingFlg,appId){
		LoadingPage();
		var userId ='<?php echo $userdata['user_id'];?>';
		parameter = {
			appId: appId,
			matchingFlg: matchingFlg,
			lang: '<?php echo $lang; ?>',
			token: btoa(userId)
		}
		if(matchingFlg=='y') $('input[name="n-'+appId+'"]').prop('checked', false);
		if(matchingFlg=='n') $('input[name="y-'+appId+'"]').prop('checked', false);
		FlgY = $('input[name="y-'+appId+'"]').prop('checked');
		FlgN = $('input[name="n-'+appId+'"]').prop('checked');
		if (!FlgY && !FlgN) {
			parameter.matchingFlg = '';
		}
		
		var JobList = $.post('<?php echo $_server?>../jobapplication/api/stdUpdateStatus.do',parameter);
		JobList.done(function( data ) {
			UnLoadingPage();
			console.log(data);
		});
	}

	function PostJobdetail(jobId,appId,userId){
		url = '<?php echo site_url();?>jobdetail';
		data ={
			jobId: jobId,
			appId:appId,
			userId:userId
		}
		var form = document.createElement("form");
		form.action = url;
		form.method = 'POST';
		form.target =  "_blank";
	  	if (data) {
		    for (var key in data) {
		      var input = document.createElement("textarea");
		      input.name = key;
		      input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
		      form.appendChild(input);
		    }
	  	}
		form.style.display = 'none';
		document.body.appendChild(form);
		form.submit();
	}
	function delJob(appId){
		var userId ='<?php echo $userdata['user_id'];?>';
		parameter = {
			appId: appId,
			appStatusId: '-9',
			lang: '<?php echo $lang; ?>',
			token: btoa(userId),
			userId:userId,
		}
		console.log(parameter);
		var delJob = $.post('<?php echo $_server?>../jobapplication/api/updateStatus.do',parameter);
		delJob.done(function( data ) {
			if(data.responseCode==200){
				location.reload();
			}
			else{
				alert('ไม่สามารลบได้');
			}
		});
	}
</script>
