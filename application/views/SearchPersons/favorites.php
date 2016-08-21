<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-12">
					<h2><?php echo lang('COMP_FAVORITES') ?></h2>
					<hr>
				</div>
				<div class="col-sm-12" style="padding-top: 15px;">
					<table id="DataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo lang('FORM_NAME_SURNAME');?></th>
								<th class="text-center"><?php echo lang('FORM_GENDER');?></th>
								<!-- <th><?php echo lang('FORM_AGE');?></th> -->
								<th class="text-center"><?php echo lang('ADD_DATE');?></th><!-- วันที่เก็บ -->
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
		var userId ='<?php echo $userdata['user_id'];?>';

		var limit= 10;
		var parameter = {
			limit: limit,
			lang: '<?php echo $lang ;?>',
			userId: userId,
			token: btoa(userId)
		}
		var api = $.post( '<?php echo $_server?>getFavoriteStudentList.do',parameter);
		api.done(function( data ) {
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
					var getJobList = $.post( '<?php echo $_server?>getFavoriteStudentList.do',parameter);
					getJobList.done(function( data ) {
						$('tbody').html('');
						for (i = 0; i < data.recordsFiltered; i++) { 
							StudentList = data.data[i];
							gender = (StudentList.genderId ==1)? '<?php echo lang("GENDER_MAN")?>' : '<?php echo lang("GENDER_WOMAN")?>';
							text = 	'<tr>'+
										'<td>'+ 
											'<a href="<?php echo site_url();?>showresume?userId='+ StudentList.userId +'" target="_blank">'+
												StudentList.stdName +
											'</a>'+
										'</td>'+
										'<td class="text-center">'+ gender +'</td>'+
										'<td class="text-center">'+ FormatDT(StudentList.updatedDate) +'</td>'+
										'<td class="text-center">'+
											' <span class="interact text-red" title="<?php echo lang('CONFIRM_DELETE') ?> &lt;span class=&#39;label label-danger pointer&#39; onclick=&#39;delFav('+StudentList.peopleId+')&#39; &gt;<?php echo lang('CONFIRM') ?>&lt;/span&gt;"><i class="fa fa-trash"></i></span>'+
										'</td>'+
									'</tr>';
			   				$('tbody').append(text);
				   			tooltipster();
						}
						UnLoadingPage();
					});
				}
			});
		});
	});

	function delFav(peopleId) {
		var userId ='<?php echo $userdata['user_id'];?>';
		var parameter = {
			peopleId: peopleId,
			lang: '<?php echo $lang ;?>',
			token: btoa(userId)
		}	
		var api = $.post( '<?php echo $_server?>removeFavoriteStudent.do?',parameter);
		api.done(function( data ) {
			if (data.responseCode == 200){
				location.reload();
			}
		});
	}

</script>