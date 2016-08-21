<div class="container">
	<h2><?php echo lang('RANK') ?></h2>
	<hr>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo lang('MAIN_JOB_RANK') ?></th>
				<th width="20%" class="text-center"><?php echo lang('YEAR') ?></th>
				<!-- <th>เบอร์ติดต่อ</th> -->
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
		LoadingPage();
		var limit= 10;
		var parameter = {
			limit: limit
		}
		var api = $.post( '<?php echo $_server?>../vcoprank/api/getVcopRank.do',parameter);
		api.done(function( data ) {
			var pag = $('#pagination').simplePaginator({
				totalPages: Math.ceil(data.data.recordsTotal /limit),
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getDocList = $.post( '<?php echo $_server?>../vcoprank/api/getVcopRank.do',parameter);
					getDocList.done(function( data ) {
						$('tbody').html('');
						for (i = 0; i < data.data.dataList.length; i++) { 
							Rank = data.data.dataList[i];
							console.log(Rank);
							text = 	'<tr>'+
										'<td>'+
											'<a href="<?php echo site_url()?>rank-file?rankId='+Rank.rankId+'">'+
												Rank.rankLvName+
											'</a>'+
										'</td>'+
										'<td class="text-center">'+
											Rank.year+
										'</td>'+
									'<tr>'
			   				$('tbody').append(text);
							UnLoadingPage();
						}
					});
					UnLoadingPage();
				}
			});
			
		});
	});
</script>
