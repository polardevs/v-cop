function scriptWork(p){
	parameter={
		startDateEn: 'y',
		limit: 4
	}
	var api = $.post( p._server+'../job/api/getJobList.do',parameter);
	api.done(function( data ) {
		for (i = 0; i < data.data.length; i++) { 
			JobLists = data.data[i];
			JobList = JobList6(JobLists,p);
			$('#JobList').append(JobList);
		}
	});
}