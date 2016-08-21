<div class="container container-body">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo lang('DEKDEE'); ?></h2>
			<hr>
		</div>
	</div>
	<div class="row hidden">
		<div class="form-group">
			<label class="col-sm-2 control-label"><?php echo lang('FORM_PROVINCE') ;?> :</label>
			<div class="col-sm-3">
				<select class="form-control valid" name="corpTypeId">
				<?php 
					foreach ($Province as $Provinces) {
						echo "<option value='". $Provinces->provinceId ."'>";
						echo $Provinces->name;
						echo "</option>";
					}
				?>						
				<select>
			</div>
			<label class="col-sm-2 control-label"><?php echo lang('FORM_SCHOOL_NAME'); ?> :</label>
			<div class="col-sm-3">
				<select class="form-control valid" name="corpTypeId">
					<option value="1">บุคคลธรรมดา</option>
					<option value="2">นิติบุคคล</option>								
				<select>
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn-blue btn center-block pull-right">
					<?php echo lang('BTN_SEARCH'); ?>
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered" >
				<thead>
					<tr>
						<th><?php echo lang('FORM_NAME_SURNAME'); ?></th>
						<th><?php echo lang('FORM_SCHOOL_NAME'); ?></th>
						<th><?php echo lang('FORM_GRADE'); ?></th>
						<th><?php echo lang('FORM_COLLEGE'); ?></th>
						<th class="text-center"><?php echo lang('FORM_END_YEAR'); ?></th>
						<th class="text-center">ระดับคะแนน</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="col-sm-12" id="pagination"></div>

	</div>
</div>
<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>
<script>
$(document).ready(function() {
	LoadingPage();
	var limit= 10;
	var parameter = {
		limit: limit,
		lang: '<?php echo $lang ;?>'
	}
	var api = $.post( '<?php echo $_server?>../goodstd/api/getRank.do',parameter);
	api.done(function( data ) {
		totalPages = Math.ceil(data.data.recordsFiltered/limit); 
		var pag = $('#pagination').simplePaginator({
			totalPages: totalPages,
			nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
			prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
			firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
			lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
			pageChange: function(page) {
				if(totalPages != 0){
					parameter.page = page;
					var Rank = $.post('http://v-cop.net:8080/vcop/api/../goodstd/api/getRank.do',parameter);
					Rank.done(function( data ) {
						console.log(data);
						$('tbody').html('');
						for (i = 0; i < data.data.recordsFiltered; i++) { 
							RankList = data.data.dataList[i];
							var point = RankList.orderIndex;
							var star ="";
							if(point==1){
								star = '<i class="fa fa-star txt" style="color:#FFD700"></i>';
							}
							if(point==2){
								star='<i class="fa fa-star txt" style="color:#C0C0C0"></i>';
							}
							if(point==3){
								star='<i class="fa fa-star txt" style="color:#C87533"></i>';
							}
							text = 	'<tr>'+
										'<td>'+
											'<a href="<?php echo site_url() ;?>showresume?userId='+ RankList.userId +'" target="_blank">'+
											RankList.stdName+
											'</a>'+
										'</td>'+
										'<td>'+
											RankList.schoolName+
										'</td>'+
										'<td>'+
											RankList.level+
										'</td>'+
										'<td>'+
											RankList.subjectName+
										'</td>'+
										'<td class="text-center">'+
											RankList.endYear+
										'</td>'+
										'<td class="text-center">'+
											star+
										'</td>'+
									'</tr>';
							$('tbody').append(text);
							UnLoadingPage();
						}
					});
				}
				UnLoadingPage();
			}
		});
	});
	UnLoadingPage();
});
</script>