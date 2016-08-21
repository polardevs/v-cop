<div class="container">
	<h2>รายงานการวิเคราะห์</h2>
	<hr>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo lang('FORM_NAME') ?></th>
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
		limit: limit
	}
	var api = $.post( '<?php echo $_server?>../laboranalysisdocument/api/getLaborDocList.do',parameter);
	api.done(function( data ) {
		var pag = $('#pagination').simplePaginator({
			totalPages: Math.ceil(data.data.recordsTotal /limit),
			nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
			prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
			firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
			lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
			pageChange: function(page) {
				parameter.page = page;
				var getDocList = $.post( '<?php echo $_server?>../laboranalysisdocument/api/getLaborDocList.do',parameter);
				getDocList.done(function( data ) {
					$('tbody').html('');
					console.log(data)
					for (i = 0; i < data.data.dataList.length; i++) { 
						getDocLists = data.data.dataList[i];
						download  = (getDocLists.filePath)? '<a href='+getDocLists.filePath+'><i class="fa fa-download" aria-hidden="true"></i></a>' : 'ไม่มีเอกสารแนบ';
						text = '<tr>'+
									'<td>'+
										getDocLists.title+
									'</td>'+
									'<td class="text-center">'+
										download+
									'</td>'+
								'<tr>';

		   				$('tbody').append(text);
					}
				});
			}
		});
		
	});
});
</script>
