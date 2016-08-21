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
				<h3><?php echo lang('STUDENT_MENU_JOB_MAILBOX') ?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2 style="display: inline-block;"><?php echo lang('MAILBOX') ?></h2>
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<table id="DataTable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('FORM_POSITION');?></th>
								<th><?php echo lang('TEABLE_CON_NAME');?></th>
								<th><?php echo lang('TEABLE_CON_DATE');?></th>
								<th><?php echo lang('FORM_ADD_POSITION_STATUS') ?></th>
								<th>ข้อความตอบกลับ</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<div class="pull-left" id="pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ข้อความตอบกลับ</h4>
        </div>
        <div class="modal-body">
          <div id="remark"></div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>

<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>
<script>
	$(document).ready(function() {
		LoadingPage();
		var limit= 10;
		var userId = '<?php echo $userdata['user_id']?>';
		var parameter = {
			userId: userId,
			limit: limit,
			corpCallBackFlg: 'y',
			userId:userId,
			lang: '<?php echo $lang ;?>'
		}
		var api = $.post( '<?php echo $_server?>../jobapplication/api/getJobListForStd.do',parameter);
		api.done(function( data ) {
			checkError = checkError(data.responseCode,data.data.dataList.length,'<?php echo lang('ERROR_ALRET') ?>');
			if(checkError == 'Error') return false;
			var pag = $('#pagination').simplePaginator({
				totalPages: (data.data.recordsTotal == 0)? 1 : Math.ceil(data.data.recordsTotal/limit),
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getJobList = $.post( '<?php echo $_server?>../jobapplication/api/getJobListForStd.do',parameter);
					getJobList.done(function( data ) {
						console.log(data);
						$('tbody').html('');
						for (i = 0; i < data.data.recordsFiltered; i++) { 
							JobLists = data.data.dataList[i];
							console.log(JobLists);
							remark = '';
							if(JobLists.remark){
								remark = '<span onclick="remarkMessage(\''+JobLists.remark+'\')" data-toggle="tooltip" title="ข้อความตอบกลับ">'+
											'<i class="fa fa-comments text-blue" aria-hidden="true"  data-toggle="modal" data-target="#myModal" ></i>'+
										'</span>';
							}
							text = 	'<tr>'+
										'<td>'+
											'<a href="javascript:PostJobdetail('+JobLists.jobId+','+JobLists.appId+','+JobLists.userId+')" target="_bank">'+ JobLists.position +'</a>'+
										'</td>'+
										'<td>'+ JobLists.corpName +'</td>'+
										'<td>'+ FormatDT(JobLists.lastModified) +'</td>'+
										'<td>'+ JobLists.appStatusName +'</td>'+
										'<td class="text-center">'+	remark +'</td>'+
									'</tr>';
			   				$('tbody').append(text);
						}
						$('[data-toggle="tooltip"]').tooltip();
					});
				}
			});
			UnLoadingPage();
		});
	});

	function remarkMessage(remarkMessage){
		$('#remark').html(remarkMessage);
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
</script>