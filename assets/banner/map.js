function scriptMap(p){
	var RegionStat = $.post(p._server+'../job/api/getRegionStat.do');
	RegionStat.done(function( data ){
		if (data.responseCode ==200) {
			$('#RegionStat').html('');
			var sum = 0;
			var sumPosition = 0;
			for (var i = 0; i < data.data.length; i++) {
				sum += parseInt(data.data[i].positions);
				sumPosition += parseInt(data.data[i].sumPositionCount);
				var Region = data.data[i];
				var text = '<div class="row">'+
							'<div class="col-xs-6 text-right margin-b-15">'+
								'<a href="'+ p.base_url +'provincestat?regionId='+Region.regionId+'">'+
								'<strong class="margin-b-15">'+Region.name +'</strong>'+
								'</a>'+
							'</div>'+
							'<div class="col-xs-3 text-center margin-b-15">'+
								'<co>'+Region.positions +'</co>'+
							'</div>'+
							'<div class="col-xs-3 text-center margin-b-15">'+
								'<co>'+Region.sumPositionCount +'</co>'+
							'</div>'+
							'</div>';
				$('#RegionStat').append(text);
			}
			$('#sumRegion').html(sum);
			$('#sumPosition').html(sumPosition);
		}
	});

	var CountStat = $.post(p._server+'../job/api/getProvinceStatMap.do');
	CountStat.done(function( data ) {
		vectorMap(data,p);
	});

	var TopView = $.post(p._server+'../job/api/getTopView.do?limit=3');
	TopView.done(function( data ){
		if (data.responseCode ==200) {
			$('#TopView').html('');
			for (i = 0; i < data.data.length; i++) { 
				var TopViews = data.data[i];
				TopViews = JobListTop(TopViews,p)
				$('#TopView').append(TopViews);

			}
		}
	});

	var TopReg = $.post(p._server+'../job/api/getTopReg.do?limit=3');
	TopReg.done(function( data ){
		if (data.responseCode ==200) {
			$('#TopReg').html('');
			for (i = 0; i < data.data.length; i++) { 
				var TopReg = data.data[i];
				TopReg = JobListTop(TopReg,p)
				$('#TopReg').append(TopReg);
			}
		}
	});

	var TopInteresting = $.post(p._server+'../job/api/getInterestedJobStat.do?limit=10');
	TopInteresting.done(function( data ) {
		$('#TopInteresting').html('');
		for (i = 0; i < data.data.length; i++) { 
			TopInterestings = data.data[i];
			textInt = '<div class="col-xs-9 TopInterestings-title" title="'+TopInterestings.name +'">'+
					'<b>'+TopInterestings.name +'</b>'+
				'</div>'+
				'<div class="col-xs-3 text-center">'+
					'<co>'+TopInterestings.cnt +'</co> อัตรา'+
				'</div>';
			$('#TopInteresting').append(textInt);
		}

		
	});

}

function vectorMap(data,p){
	$.fn.vectorMap('addMap', 'thailand_th', {
		"width": 900, 
		"top": 0, 
		"height": 1636.6464833349905, 
	     "paths": data,	
	});
	$('#vmap').vectorMap({
		map: 'thailand_th',
		backgroundColor: '#fff',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 2,
		color: '#4c73a1',
		enableZoom: true,
		hoverColor: '#d9dff3',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		selectedColor: '#c9dfaf',
		showTooltip: true,
		onRegionClick: function (element, code, region) {
			url = p.base_url+'sjobs';
			data ={ provinceId: code, post:'post' }
			var form = document.createElement("form");
			form.action = url;
			form.method = 'POST';
			form.target =  "_self";
			form.style.display = 'none';
			if (data) {
			    for (var key in data) {
			      var input = document.createElement("textarea");
			      input.name = key;
			      input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
			      form.appendChild(input);
			    }
		  	}
			document.body.appendChild(form);
			form.submit();
		}	
    });
}