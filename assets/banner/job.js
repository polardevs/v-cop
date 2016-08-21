function scriptJob(p){
	$('#find-person').click(function(event) {
		$('.s-Job').hide();
		$('.s-Person').show();
		$(".select2").select2({ width: 'resolve' });
		$('#schoolId').select2({placeholder: p.MAIN_SPERSON_SCHOOL});
		$('#subjectId').select2({placeholder: p.MAIN_SPERSON_COLLEGE});
	});
	$('#find-job').click(function(event) {
		$('.s-Job').show();
		$('.s-Person').hide();
		$(".select2").select2({ width: 'resolve' });
		$('.person-more').html('<p class="pull-right color-f ">+ ค้นหาแบบละเอียด</p>')
		$('.search-school').hide();
	});
	$('.person-more').click(function(event) {
		if($('.person-more').html() == '<p class="pull-right color-f ">- ค้นหาแบบย่อ</p>'){
			$('.search-school').hide();
			$('.person-more').html('<p class="pull-right color-f ">+ ค้นหาแบบละเอียด</p>');
			$('#schoolId').select2({placeholder: p.MAIN_SPERSON_SCHOOL});
		}else{
			$('.search-school').show();
			$('.person-more').html('<p class="pull-right color-f ">- ค้นหาแบบย่อ</p>');
			$(".select2").select2({ width: 'resolve' });
			$('#subjectId').select2({placeholder: p.MAIN_SPERSON_COLLEGE});
			$('#schoolId').select2({placeholder: p.MAIN_SPERSON_SCHOOL});
		}
	});
}