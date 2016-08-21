<div class="container">
	<h2><?php echo lang('STAFT'); ?></h2>
	<hr>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ชื่อ - สกุล</th>
				<th>ตำแหน่ง</th>
				<th>อีเมล์</th>
				<th>เบอร์ติดต่อ</th>
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
		var api = $.post( '<?php echo $_server?>../staff/api/getStaffList.do',parameter);
		api.done(function( data ) {
			var pag = $('#pagination').simplePaginator({
				totalPages: Math.ceil(data.data.recordsTotal /limit),
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var getDocList = $.post( '<?php echo $_server?>../staff/api/getStaffList.do',parameter);
					getDocList.done(function( data ) {
						$('tbody').html('');
						console.log(data)
						for (i = 0; i < data.data.dataList.length; i++) { 
							Stafts = data.data.dataList[i];
							console.log(Stafts);
							text = '<tr>'+
										'<td>'+
											Stafts.nameLastname +
										'</td>'+
										'<td>'+
											Stafts.responsible +
										'</td>'+
										'<td>'+
											Stafts.email +
										'</td>'+
										'<td>'+
											Stafts.tel +
										'</td>'+
									'<tr>';
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
