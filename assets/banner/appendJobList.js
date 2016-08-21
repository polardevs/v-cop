function JobList6(JobLists,p){
	text = '<div class="col-sm-6 padding-t-20">'+
				'<div class="news-announce">'+
					'<h4>'+	JobLists.position+'</h4>'+
					'<p>จำนวน '+
						'<b>'+JobLists.positionCount+ ' อัตรา '+
						'</b>  เงินเดือน <b>'+JobLists.salary+'</b>'+
					'</p>'+
					'<p>'+JobLists.corpName+'</p>'+
					'<p>จังหวัด'+ JobLists.provinceName +'</p>'+
					'<span class="Announce">ประกาศ '+ 
						FormatDT(JobLists.startDate) +' เข้าชม '+ JobLists.cntView +
					'</span>'+
					'<div class="pull-right detail">'+
						'<a href="'+p.base_url+'jobdetail?jobId='+JobLists.jobId+'" target="_blank">'+
							'<span class="detail">รายละเอียด </span>'+
						'</a>'
					'</div>'+
				'</div>'+
			'</div>';
	return text;
}

function JobListTop(JobLists,p){
	text =	'<div class="ListTop">'+
				'<div class="row">'+
					'<div class="col-xs-9">'+
						'<co><b>'+JobLists.position +'</b></co>'+
					'</div>'+
					'<div class="col-xs-3 text-center">'+
						'<co>'+JobLists.positionCount +'</co> อัตรา'+
					'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xs-12">'+
						'<b>'+JobLists.corpName +'</b>'+
					'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xs-12 detail">'+
						'<a href="'+p.base_url+'jobdetail?jobId='+JobLists.jobId+'" target="_blank">'+
							'<span class="detail pull-right">รายละเอียด </span>'+
						'</a>'+
					'</div>'+
				'</div>'+
				'<hr style="margin: 10px 0;">'+
			'</div>';
	return text;
}

function JobLista(JobLists,p){
	text = JobLists.position;
	return text;
}
function JobList12(JobLists,p){
	urgentFlg ='';
	if(JobLists.urgentFlg == 'y'){
		urgentFlg = '<span class="label label-danger pull-right">'+
				p.URGENT+
			'</span>';
	}
	text = '<div class="col-sm-12">'+
				'<div class="news-announce margin-b-20">'+
					'<h4>'+	JobLists.position+ urgentFlg + '</h4>'+ 
					'<div class="row">'+
						'<div class="col-sm-8 announce-student">'+
							JobLists.corpName+ '<br>'+
							p.FORM_PROVINCE+ JobLists.provinceName+ '<br>'+
							'<span class="createDt">'+
								p.STARTDATE+
								FormatDT(JobLists.createdDate)+' '+
								p.ARTICLE_VIEW +' '+
								JobLists.cntView+
							'</span>'+
						'</div>'+
						'<div class="col-sm-4 text-right announce-student">'+
							'<span class="h6">'+
								p.AMOUNT+ ' '+
								'<span class="p1"> ' + ' '+
									JobLists.positionCount+' '+
									p.POSITION_COUNT+
								'</span>'+
							'</span>'+
							'<br>'+
							'<span class="h6">'+
								p.FORM_SWORK_SALARY+' '+
								'<span class="p1">'+
									JobLists.salary+
								'</span>'+
							'</span>'+
							'<br>'+
							'<div class="pull-right detail">'+
								'<a href="'+p.base_url+'jobdetail?jobId='+JobLists.jobId+'" target="_blank">'+
										p.FORM_PORT_DESC+
								'</a>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>';
	return text;
}

function StudentList6(StudentLists,p){
	console.log("---------- StudentLists ----------");
	console.log(StudentLists);
	announce = '';
	intJob ='';
	reqJobTypes ='';

	intJob += (StudentLists.intJob1 != "")? StudentLists.intJob1+',' :'';
	intJob += (StudentLists.intJob2 != "")? StudentLists.intJob2+',' :'';
	intJob += (StudentLists.intJob3 != "")? StudentLists.intJob3+',' :'';
	intJob = intJob.substring(0, (intJob.length-1));
	intJob = (intJob)? intJob: p.SELECT_NONE;
	reqJobTypes = (StudentLists.reqJobTypes)? StudentLists.reqJobTypes: p.SELECT_NONE;

	gendername = (StudentLists.genderId == 1)? p.GENDER_MAN:p.GENDER_WOMAN;
	preferedIncome = (StudentLists.preferedIncome)? StudentLists.preferedIncome : 'ไม่ระบุ';
	form_age = "";

	if(p.userRole==4){
 		var announce = '<div class="col-sm-5 text-right announce-company detail">'+
			'<a href="'+p.base_url+'showresume?userId='+StudentLists.userId+'" target="_blank">'+
				p.PORT_DESC+
			'</a>'+
			'<a href="'+p.base_url+'position/comapany-mail?userId='+StudentLists.userId+'" target="_blank" class="padding-l-5">'+
				p.SEND_MAIL+
			'</a>'+
		'</div>	';
 	}
 	if(StudentLists.age && StudentLists.age >0 ){
 		form_age = p.FORM_AGE +'  :  ' + StudentLists.age ;
 	}

 	text =  '<div class="col-sm-6">'+
 				'<div class="news-announce margin-b-20">'+
					'<div class="row">'+
						'<div class="col-sm-12 announce-company">'+
							p.NAME_SURNAME+' : '+
							'<span class="text-blue">'+ 
								StudentLists.stdName+ 
							'</span>'+
							'<br>'+
							p.INTERESTED_WORK+':'+
							'<span class="text-blue"> '+ intJob+ '</span>'+
							'<br>'+
							p.EMPLOYMENT_TYPE+' : '+
							'<span class="text-blue">'+
								reqJobTypes+
							'</span>'+
							'<br>'+
							'<span>'+
								p.FORM_GRADE+' : '+
								'<span class="text-blue">' + StudentLists.level + '</span>' +
								' '+p.COLLEGE+' : ' +
								'<span class="text-blue">' + StudentLists.subjectName + '</span>' +
							'</span>'+
						'</div>'+
						'<div class="col-sm-8 announce-company">'+
							'<span>'+
								p.GENDER +' : '+gendername + ' '+
								form_age+
							'</span>'+
						'</div>'+
						'<div class="col-sm-4 text-right announce-company">'+
							'<strong>'+
								p.SWORK_SALARY+' : <span class="text-red">'+
								preferedIncome+
								'</span>'+
							'</strong>	'+
						'</div>'+

						'<div class="col-sm-7 announce-company">'+
							'<span>'+
								p.PROVINCE+
									StudentLists.provinceName+
							'</span>'+
						'</div>'+announce+
					'</div>'+
				'</div>'+
			'</div>';

 	return text;
}