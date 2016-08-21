<div class="container container-body margin-b-25">
	<h2>ภูมิภาค</h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo lang('FORM_PROVINCE') ?></th>
				<th><?php echo lang('FORM_POSITION') ?></th>
				<th>อัตรา</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		var regionId = '<?php echo $this->input->get('regionId');?>'
		var segment = '<?php echo $this->uri->segment(1) ?>';
		url='<?php echo $_server?>../job/api/getProvinceStat.do?regionId='+regionId;
		var Province = $.post(url);
		Province.done(function( data ){
			$('tbody').html('');
			for (i = 0; i < data.data.length; i++) {
				
				Provinces = data.data[i];
				text = 	'<tr>'+
							'<td>'+
								'<form method="POST" action="<?php site_url();?>sjobs">'+
									'<input type="hidden" name="provinceId" value="'+Provinces.provinceId+'">'+
									'<input type="hidden" name="post" value="post">'+
									'<a  href="#" onclick="$(this).closest(\'form\').submit()">'+
										Provinces.provinceName+
									'<a>'+
								'</form>'+
							'</td>'+
							'<td>'+
								Provinces.positions+
							'</td>'+
							'<td>'+
								Provinces.sumPositionCount+
							'</td>'+
						'</tr>';
				$('tbody').append(text);
				UnLoadingPage();
			}
			UnLoadingPage();
		});
	});
</script>