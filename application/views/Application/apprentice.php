<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-12">
					<h2>รายชื่อผู้สมัครงาน</h2>
					<hr>
				</div>
				<div class="form-group col-sm-6 hidden">
					<label class="col-sm-4 control-label text-right">วันที่เริ่ม :</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">						
					</div>
				</div>
				<div class="form-group col-sm-6 hidden">
					<label class="col-sm-4 control-label text-right">วันที่สิ้นสุด :</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">						
					</div>
				</div>
				
				<div class="col-sm-12 " style="padding-top: 15px;">
					<table id="DataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ชื่อ-สกุล</th>
								<th>เพศ</th>
								<th>อายุ</th>
								<th>วันที่สมัคร</th>
								<th>สถานะการติดต่อ</th>
								<th>วันที่ติดต่อ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<div class="col-sm-12" id="pagination"></div>
				</div>
				
			</div>
		</div>
	</div>

</div>
<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>

<script>
	$(document).ready(function() {
		LoadingPage();
		var jobId ='<?php echo $this->input->get('jobId');?>';
		var limit= 10;
		var parameter = {
			jobId: jobId,
			limit: limit,
			lang: '<?php echo $lang ;?>'
		}
		var api = $.post( '<?php echo $_server?>../jobapplication/api/getStdListForCorp.do',parameter);
		api.done(function( data ) {
			var pag = $('#pagination').simplePaginator({
				totalPages: Math.ceil(data.data.recordsTotal/limit),
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getJobList = $.post( '<?php echo $_server?>../jobapplication/api/getStdListForCorp.do',parameter);
					getJobList.done(function( data ) {
						$('tbody').html('');
						for (i = 0; i < data.data.recordsFiltered; i++) { 
							JobLists = data.data.dataList[i];
							text = 	'<tr>'+
										'<td>'+
											'<a href="<?php echo site_url();?>showresume?userId='+ JobLists.userId +'" target="_bank">'+
										 	JobLists.stdName +
										 '</a></td>'+
										'<td>'+ JobLists.gender +'</td>'+
										'<td>'+ findAge(JobLists.birthdate) +'</td>'+
										'<td>'+ FormatDT(JobLists.registerDate) +'</td>'+
										'<td>'+ JobLists.appStatusName +'</td>'+
										'<td>'+ FormatDT(JobLists.lastModified) +'</td>'+
										'<td class="text-center">'+

											'<a href="javascript:PostcMail('+JobLists.jobId+','+JobLists.appId+' ,'+JobLists.userId+')" data-toggle="tooltip" title="ติดต่อผู้สมัคร">'+
												'<i class="fa fa-pencil-square-o text-blue"></i>'+
											'</a> '+
											' <a href="javascript:PostJobdetail('+JobLists.jobId+','+JobLists.appId+',<?php echo $userdata['user_id']; ?>) ; void 0" target="_self" data-toggle="tooltip" title="รายละเอียดงาน">'+
												'<i class="fa fa-comments text-blue"></i>'+
											'</a>'+
											
										'</td>'+
									'</tr>';
			   				$('tbody').append(text);
			   				UnLoadingPage();
			   				$('[data-toggle="tooltip"]').tooltip(); 
						}
					});
				}
			});
		});
	});
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
	function PostcMail(jobId,appId,studentId){
		url = '<?php echo site_url();?>position/comapany-mail';
		data ={
			jobId: jobId,
			appId:appId,
			studentId:studentId
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