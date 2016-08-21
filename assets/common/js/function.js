function setAjax(postURL, unSuccessURL,parameter){
	return  $.ajax({
	    url: postURL,
	   	datatype: 'json',
	   	data:parameter,
	    type: 'POST',
	    xhrFields: {
	       	withCredentials: true
	    },
	});
}

function FormatDT(dateset,space){
	space = (space)? space : '-';
	var convertedStartDate = new Date(dateset);
    var month = ("0" + (convertedStartDate.getMonth() + 1)).slice(-2)
    var day = ("0" + convertedStartDate.getDate()).slice(-2);
    var year = convertedStartDate.getFullYear();
    var shortStartDate = day + space + month + space + year;
    return shortStartDate;
}

function validAttachment(){
	var filetype = $('#insert-modal [name="attachment"]')[0].files[0];
	if (filetype){
		console.log(filetype.type);
		if(filetype.type == 'application/pdf' || filetype.type == 'image/png' || filetype.type == 'image/jpeg') {
			formpast = true;
			$('#error-attachment').hide();
		}
		else {
			$('#error-attachment').html('<b>โปรดเลือกไฟล์ที่นามสกุล .pdf, .png, .jpg หรือ .jpeg เท่านั้น</b>').show();
			formpast = false;
		}
		console.log(formpast);
	}else{
		$('#error-attachment').html('<b>เพิ่มประกาศ, เกียรติบัตรหรือเอกสารอื่นๆที่อ้างอิงได้ เพื่อประกอบความน่าเชื่อถือ</b>').show();
		formpast = false;
	}
	return formpast;
}

function tooltipster(){
	$('.interact').tooltipster({
		contentAsHTML: true,
		interactive: true,
		multiple: true,
		// theme: 'tooltipster-light'
	});
}

function findAge(birthdate){
	if(!birthdate){
		yearFinal = '';
	}
	else{
		var getdayBirth = birthdate.split("-");    
	    var YB = getdayBirth[2]-543;    
	    var MB = getdayBirth[1];    
	    var DB = getdayBirth[0];    
	    var setdayBirth=moment(YB+"-"+MB+"-"+DB);      
	    var setNowDate=moment();    
	    var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม    
	}
	return yearFinal;
}

function Favorites(jobId,_server,lang,userId){
		parameters={
			jobId: jobId, 
			lang: lang,
			userId: userId,
			token: btoa(userId)
		}
		console.log(parameters);
		var api = $.post( _server+'../job/api/favoriteJob.do?',parameters);
		api.done(function( data ) {
			console.log(data);
			if (data.responseCode == 200){
				location.reload();
			}
		});
	}

function Print() {
    window.print();
}

function LoadingPage(){
	// console.log('LoadingPage();');
	$('.loading').show();
	$( "body" ).addClass( "lock-scroll" );
}

function UnLoadingPage(){
	// console.log('UnLoadingPage();');
	$('.loading').hide();
	$( "body" ).removeClass( "lock-scroll" );
}

function ChatBox() {
	
	$('.chat-box-background').show();
	$('.chat-box-massage').show('slow/400/fast');
	$('.chat-box').hide('slow/400/fast');
	var d = $('.chat-box-chats');
	d.scrollTop(d.prop("scrollHeight"));

}

function MinusBox() {
	$('.chat-box-background').hide();
	$('.chat-box-massage').hide('slow/400/fast');
	$('.chat-box').show('slow/400/fast');
}
function checkLogout(userId,site_url){
	if(!userId){
		window.location = site_url+'auth/logout';
	}
}
function getSchool(_server,placeholder,schoolId,PprovinceId,onload){
	if(!PprovinceId ||  PprovinceId == '-1' ){
		$('#schoolId').prop("disabled", true);
		$('#subjectId').select2({placeholder: onload});
		var school = $.post(_server+'/getSchoolList.do?');
		school.done(function( data ) {
			$('#schoolId').html('');
			text = '<option value="-1">'+placeholder+'</option>';;
			for (var i = 0; i < data.length; i++) {
				var curr = data[i];
				text += 	'<option value="'+curr.schoolId+'">'+ curr.name +'</option>';
			}
			$('#schoolId').append(text);
			$('#schoolId').select2({placeholder: placeholder});
			$('#schoolId').prop("disabled", false);
			if(schoolId){
				$("select[name='schoolId']").select2('val',schoolId);
			}
		});
	}else{
		$('#schoolId').prop("disabled", true);
		$('#subjectId').select2({placeholder: onload});
		var school = $.post(_server+'/getSchoolByProvince.do?provinceId='+PprovinceId);
		school.done(function( data ) {
			console.log(data);
			$('#schoolId').html('');
			text = '<option value="-1">'+placeholder+'</option>';;
			for (var i = 0; i < data.data.length; i++) {
				var curr = data.data[i];
				text += 	'<option value="'+curr.schoolId+'">'+ curr.name +'</option>';
			}
			$('#schoolId').append(text);
			$('#schoolId').select2({placeholder: placeholder});
			if(schoolId){
				$("select[name='schoolId']").select2('val',schoolId);
			}
			$('#schoolId').prop("disabled", false);
		});
	}
}
function changeSubject(levelId,_server,onload,loaded) {
	$('#subjectId').prop("disabled", true);
	$('#subjectId').select2({placeholder: onload});
	var Subject = $.post(_server+'../job/api/jobSubject.do?levelId='+levelId);
	Subject.done(function( data ) {
		$('#subjectId').html('');
		for (var i = 0; i < data[0].subjectList.length; i++) {
			var subjectList = data[0].subjectList[i];
			text =	'<option value="'+subjectList.subjectId+'">'+subjectList.name+
					'</option>';
			$('#subjectId').append(text);
			$('#subjectId').select2({placeholder: loaded});
			$('#subjectId').prop("disabled", false);
		}
	});
}
function validAttachments(attFilePathOld){
	if(attFilePathOld){
		return formpast;
	}
	else{
		var filetype = $('#insert-modal [name="attachment"]')[0].files[0];
		if (filetype){
			console.log(filetype.type);
			if(filetype.type == 'application/pdf' || filetype.type == 'image/png' || filetype.type == 'image/jpeg') {
				formpast = true;
				$('#error-attachment').hide();
			}
			else {
				$('#error-attachment').html('<b>โปรดเลือกไฟล์ที่นามสกุล .pdf, .png, .jpg หรือ .jpeg เท่านั้น</b>').show();
				formpast = false;
			}
			console.log(formpast);
		}else{
			$('#error-attachment').html('<b>เพิ่มประกาศ, เกียรติบัตรหรือเอกสารอื่นๆที่อ้างอิงได้ เพื่อประกอบความน่าเชื่อถือ</b>').show();
			formpast = false;
		}
		return formpast;
	}
}

function changedistrictIds(p) {
	if(p.provinceId){
		$.ajax({
		  	url: p._server+"getDistrict.do?provinceId="+p.provinceId,
		  	success: function( data ) {
		  		$("#districtId option").remove();
		  		$("#subDistrictId option").remove();
		  		for (var i = 0; i <  data.length; i++) {
		  			$('#districtId').append($('<option>', { 
				        value: data[i].districtId,
				        text : data[i].name 
			    	}));
		  		}
		  		$('#districtId').select2("val",p.districtId);
				changesubDistrictIds(p);
		  	}
		});
	}
	if(p.provinceIdCurr){
		$.ajax({
		  	url: p._server+"getDistrict.do?provinceId="+p.provinceIdCurr,
		  	success: function( data ) {
		  		$("#districtIdCurr option").remove();
		  		$("#subDistrictIdCurr option").remove();
		  		for (var i = 0; i <  data.length; i++) {
			    	$('#districtIdCurr').append($('<option>', { 
				        value: data[i].districtId,
				        text : data[i].name 
			    	}));
		  		}
		  		$('#districtIdCurr').select2("val",p.districtIdCurr);
				changesubDistrictIdsCurr(p);
		  	}
		});
	}
}
function changesubDistrictIdsCurr(p){
	$.ajax({
	  	url: p._server+"getSubDistrict.do?districtId="+p.districtIdCurr,
	  	success: function( data ) {
	  		$("#subDistrictIdCurr option").remove();
	  		option = '';
	  		$.each(data, function() {
	  			option += '<option value="'+ this.subDistrictId +'">' + this.name +'</option>'
			});
	    	$( "#subDistrictIdCurr" ).append(option);
			$( "#subDistrictIdCurr" ).select2("val",p.subDistrictIdCurr);
	  	}
	});
}

function changesubDistrictIds(p){
	$.ajax({
	  	url: p._server+"getSubDistrict.do?districtId="+p.districtId,
	  	success: function( data ) {
	  		$("#subDistrictId option").remove();
	  		option = '';
	  		$.each(data, function() {
	  			option += '<option value="'+ this.subDistrictId +'">' + this.name +'</option>'
			});
			$( "#subDistrictId" ).append(option);
			$( "#subDistrictId" ).select2("val",p.subDistrictId);
	  	}
	});
	return false;
}

function checkError(responseCode,length,_alert){
	_return = '';
	if(responseCode != 200 && responseCode ){
		alert(_alert);
		_return = 'Error';
		UnLoadingPage();
	}
	if(length ==0){
		UnLoadingPage();
		_return = 'Error';
	}
	return _return;
}