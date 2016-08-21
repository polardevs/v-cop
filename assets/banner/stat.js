function scriptStat(p){
	var CountStat = $.post(p._server+'../frontIndex/api/getCountStat.do');
	CountStat.done(function( data ) {
		if(data.responseCode == 200){
			$('#CountStat-studentCount').html(numeral(data.data.studentCount).format('0,0')+' คน');
			$('#CountStat-corpCount').html(numeral(data.data.corpCount).format('0,0')+' แห่ง');
			$('#CountStat-schoolCount').html(numeral(data.data.schoolCount).format('0,0')+' แห่ง');
			$('#CountStat-regSuccessCount').html(numeral(data.data.regSuccessCount).format('0,0')+' คน');
		}
	});
}