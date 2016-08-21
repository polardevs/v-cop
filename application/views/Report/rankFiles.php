<div class="container">
	<?php  
		if($this->input->get('rankId') == 1){
			$title = 'ระดับประเทศ';
		}
	?>
	<h2><?php echo $title ?></h2>
	<hr>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo lang('FILE_NAME') ?></th>
				<th>ประเภทสถานศึกษา</th>
				<th><?php echo lang('FORM_PROVINCE') ?></th>
				<th width="20%" class="text-center"><?php echo lang('DOWNLOAD') ?></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		
	</table>
	<div class="col-sm-12" id="pagination"></div>
</div>
<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>

<script>
$(document).ready(function() {
	var limit= 10;
	var parameter = {
		limit: limit,
		lang: '<?php echo $lang ;?>',
		rankId: '<?php echo $this->input->get("rankId");?>'
	}
	var api = $.post( '<?php echo $_server?>../vcoprank/api/getVcopRankFile.do',parameter);
	api.done(function( data ) {
		var pag = $('#pagination').simplePaginator({
			totalPages: Math.ceil(data.data.recordsTotal /limit),
			nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
			prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
			firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
			lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
			pageChange: function(page) {
				parameter.page = page;
				var getDocList = $.post( '<?php echo $_server?>../vcoprank/api/getVcopRankFile.do',parameter);
				getDocList.done(function( data ) {
					$('tbody').html('');
					for (i = 0; i < data.data.dataList.length; i++) { 
						Rank = data.data.dataList[i];
						console.log(Rank);
						fileName = (Rank.fileName == null)? 'ไม่ระบุ' : Rank.fileName;
						
						text = 	'<tr>'+
									'<td>'+
										fileName+
									'</td>'+
									'<td>'+
										Rank.schoolType+
									'</td>'+
									'<td>'+
										Rank.region+
									'</td>'+
									'<td class="text-center">'+
										'<a href="'+Rank.filePath+'">'+
											'<i class="fa fa-download" aria-hidden="true"></i>'+
										'</a>'+
									'</td>'+
								'<tr>'
		   				$('tbody').append(text);
					}
				});
			}
		});
		
	});
});
</script>
