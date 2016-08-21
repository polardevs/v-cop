<div class="container container-body margin-b-25">
	<?php 
		$head = 'รายชื่อสถานศึกษา';
		$title = 'ชื่อสถานศึกษา';
		$address = 'ที่อยู่สถานศึกษา';
		if($this->uri->segment(1) =='corp') $title = 'ชื่อสถานประกอบการ';
		if($this->uri->segment(1) =='corp') $head = 'รายชื่อสถานประกอบการ';
		if($this->uri->segment(1) =='corp') $address = 'ที่อยู่สถานประกอบการ';
	?>

	<h2><?php echo $head ?></h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo $title ?></th>
				<th><?php echo $address ?></th>
				<th>เบอร์ติดต่อ</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		var provinceId = '<?php echo $this->input->get('provinceId');?>';

		var segment = '<?php echo $this->uri->segment(1) ?>';
		if(segment == 'school'){
			url='<?php echo $_server?>getSchoolByProvince.do?provinceId='+provinceId;
		}
		else{
			url='<?php echo $_server?>getCorpByProvince.do?provinceId='+provinceId+'&limit=1000';
		}

		var List = $.post(url);
		List.done(function( data ){
			$('tbody').html();
			lengths = (segment == 'school')? data.data.length : data.data.dataList.length;
			for (i = 0; i < lengths; i++) {
				if(segment == 'school'){
					Lists = data.data[i];
					address= Lists.address+ " " + Lists.tambol + " "+ Lists.amphur +" "+Lists.province;
				}else{
					Lists = data.data.dataList[i];
					address = Lists.address;
				}
				text = 	'<tr>'+
							'<td>'+
								Lists.name+
							'</td>'+
							'<td>'+
								address+
							'</td>'+
							'<td>'+
								Lists.tel+
							'</td>'+
						'</tr>';
				$('tbody').append(text);
				UnLoadingPage()
			}
			UnLoadingPage()
		});
	});
</script>