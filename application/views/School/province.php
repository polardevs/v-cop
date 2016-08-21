<div class="container container-body margin-b-25">
	<h2>จังหวัด</h2>
	<?php $cnt = 'จำนวนของสถานศึกษา';
		if($this->uri->segment(1) =='corp') $cnt = 'จำนวนของสถานประกอบการ';
	?>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo lang('FORM_PROVINCE') ?></th>
				<th class="text-center"><?php echo $cnt ?></th>
				<th><?php echo lang('FORM_PROVINCE') ?></th>
				<th class="text-center"><?php echo $cnt ?></th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		var segment = '<?php echo $this->uri->segment(1) ?>';
		if(segment == 'school'){
			url='<?php echo $_server?>getProvinceSchool.do';
		}
		else{
			url='<?php echo $_server?>getProvinceCorp.do';
		}

		var Province = $.post(url);
		Province.done(function( data ){
			$('tbody').html('');
			for (i = 0; i < data.data.length; i+=2) {
				Provinces = data.data[i];
				Provincese = data.data[i+1];
				cnt = (segment=='school')? Provinces.schoolCnt : Provinces.corpCnt;
				cnts = (segment=='school')? Provincese.schoolCnt : Provincese.corpCnt;
				text = 	'<tr>'+
							'<td>'+
								'<a href="<?php echo site_url();?>'+segment+'/list?provinceId='+ Provinces.provinceId +'">'+
									Provinces.provinceName+
								'</a>'+
							'</td>'+
							'<td class="text-center">'+
								cnt+
							'</td>'+
							'<td>'+
								'<a href="<?php echo site_url();?>'+segment+'/list?provinceId='+ Provincese.provinceId +'">'+
									Provincese.provinceName+
								'</a>'+
							'</td>'+
							'<td class="text-center">'+
								cnts+
							'</td>'+
						'</tr>';
				$('tbody').append(text);
				UnLoadingPage();
			}
			UnLoadingPage();
		});
	});
</script>