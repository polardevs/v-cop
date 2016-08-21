<div class="container container-body">
	<div class="row">
		<div class="col-sm-12">
			<form name="search" id="searchStudent" method="POST" enctype="multipart/form-data">
				<?php  $this->load->view('/SearchPersons/FormSearch'); ?>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12" id="result-student">
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

	
	<div id="student" class="row"></div>
	<div class="col-sm-12">
		<div id="pagination" class="pull-left"></div>
	</div>
</div>
<script>
	$(document).ready(function() {
		LoadingPage();
		$('#result-student').hide();
		$('#result-not-found').hide();
		$('.select2').select2({ width: 'resolve' });

		$('#PprovinceId').change(function(event) {
			getSchool("<?php echo $_server?>","<?php echo lang('MAIN_SPERSON_SCHOOL') ?>",schoolId,$('#PprovinceId').val(),'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');
		});
		getSchool("<?php echo $_server?>","<?php echo lang('MAIN_SPERSON_SCHOOL') ?>",schoolId,'','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');

		var limit= 10;
		var parameter = {
			limit: limit,
			lang: '<?php echo $lang ;?>'
		}

		if('<?php echo($this->input->post("post")) ;?>'){
			provinceId = '<?php echo $this->input->post("provinceId")?>';
			$("select[name='endYear']").val('<?php echo $this->input->post("endYear")?>');
			$("select[name='provinceId']").val((provinceId)? provinceId : -1);
			$("select[name='jobTypeId']").val('<?php echo $this->input->post("jobTypeId")?>');
			$("select[name='levelId']").val('<?php echo $this->input->post("levelId")?>');
			$("select[name='schoolId']").val('<?php echo $this->input->post("schoolId")?>');
			
			$("#subjectId").select2("val", '<?php $this->input->post("subjectId") ?>')

			changeSubject('<?php echo $this->input->post("levelId")?>','<?php echo $_server?>','<?php echo lang('ONLOAD') ?>','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>')
			parameter.endYear='<?php echo $this->input->post("endYear")?>';
			parameter.provinceId='<?php echo $this->input->post("provinceId")?>';
			parameter.jobTypeId='<?php echo $this->input->post("jobTypeId")?>';
			parameter.levelId='<?php echo $this->input->post("levelId")?>';
			parameter.schoolId='<?php echo $this->input->post("schoolId")?>';
			str = '<?php echo json_encode($this->input->post("subjectId")); ?>'
			if(str != "false"){
				str2 = str.replace(/[\(\)\[\]{}'"]/g,"")
			}else{
				str2='';
			}
			parameter.subjectId=str2;
			$('#schoolId').select2({placeholder: "<?php echo lang('MAIN_SPERSON_SCHOOL') ?>"});

			setStudent(parameter);
		}
		
		$('.find').click(function(event) {
			LoadingPage();
			var submit = $( "form#searchStudent").serializeArray();
			for (var i = 0; i < submit.length; i++) {
				parameter[submit[i].name] = submit[i].value;
			}
			setStudent(parameter);
		});
		$('#levelIdP').change(function(event) {
	    	$("#subjectId").select2("val", "");
	    	changeSubject($('#levelIdP').val(),'<?php echo $_server?>','<?php echo lang('ONLOAD') ?>','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>')
		});
		$('#subjectId').select2({placeholder: "สาขาวิชา"});

		$('.person-more').click(function(event) {
			if($('.person-more').html() == '<p class="pull-right color-f ">- ค้นหาแบบย่อ</p>'){
				$('.search-school').hide();
				$('.person-more').html('<p class="pull-right color-f ">+ ค้นหาแบบละเอียด</p>');
			}else{
				$('.search-school').show();
				$('.person-more').html('<p class="pull-right color-f ">- ค้นหาแบบย่อ</p>');
				$(".select2").select2({ width: 'resolve' });
				$('#subjectId').select2({placeholder: "<?php echo lang('MAIN_SPERSON_COLLEGE') ?>"});
				$('#schoolId').select2({placeholder: "<?php echo lang('MAIN_SPERSON_SCHOOL') ?>"});
			}
		});
	});

	function setStudent(parameter){
		parameter.schoolId  = (parameter.schoolId == -1)? '':parameter.schoolId;
		console.log(parameter);
		parameter.provinceId =  (parameter.provinceId == -1)? '':parameter.provinceId;
		userRole ='<?php echo(isset($userdata['user_role_id']))? $userdata['user_role_id']:-1;?>';
		var api = $.post( '<?php echo $_server?>getStudentListCount.do',parameter);
		api.done(function( data ) {
				$('#student').html('');
				totalPages = Math.ceil(data.data.recordsTotal/parameter.limit);
			if (totalPages <=0){	
				$('#result-student').hide();
				$('#result-not-found').show();
				$('#pagination').hide('');
			UnLoadingPage();
			}else{
				$('#result-student').show();
				$('#result-not-found').hide();
				$('.p1').html('"'+data.data.recordsTotal+'"');
				var pag = $('#pagination').simplePaginator({
				totalPages: totalPages,
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					LoadingPage();
					$('#student').html('');
					parameter.page = page;
					var getJobList = $.post( '<?php echo $_server?>getStudentList.do',parameter);
					getJobList.done(function( data ) {
						for (i = 0; i < data.data.dataList.length; i++) { 
						 	StudentLists = data.data.dataList[i];
							p={
								userRole : userRole,
								PORT_DESC : '<?php echo lang('FORM_PORT_DESC') ?>',
								SEND_MAIL : '<?php echo lang('SEND_MAIL') ?>',
								GENDER_MAN: '<?php echo lang('GENDER_MAN') ?>',
								GENDER_WOMAN: '<?php echo lang('GENDER_WOMAN') ?>',
								NAME_SURNAME: '<?php echo lang('FORM_NAME_SURNAME') ?>',
								INTERESTED_WORK: '<?php echo lang('FORM_INTERESTED_WORK') ?>',
								EMPLOYMENT_TYPE: '<?php echo lang('FORM_EMPLOYMENT_TYPE') ?>',
								GENDER: '<?php echo lang('FORM_GENDER') ?>',
								FORM_GRADE: '<?php echo lang('FORM_GRADE') ?>',
								SWORK_SALARY: '<?php echo lang('FORM_SWORK_SALARY') ?>',
								PROVINCE: '<?php echo lang('FORM_PROVINCE') ?>',
								FORM_AGE: '<?php echo lang('FORM_AGE'); ?>',
								COLLEGE: '<?php echo lang('FORM_COLLEGE'); ?>',
								SELECT_NONE: '<?php echo lang('SELECT_NONE') ?>',
								base_url: '<?php echo base_url() ?>'
							}
							StudentLists = StudentList6(StudentLists,p)
				   			$('#student').append(StudentLists);
							UnLoadingPage();
							}
						});
					}
				});	
			}
		});
	}
</script>