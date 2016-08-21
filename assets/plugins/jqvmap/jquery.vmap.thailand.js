function vectorMap(data){
	jQuery.fn.vectorMap('addMap', 'thailand_th', {
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
		color: '#444',
		enableZoom: true,
		hoverColor: '#DA251D',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		showTooltip: true,
		onRegionClick: function (element, code, region) {
			console.log(element);
			console.log('code : '+ code + 'region : '+ region);
			$('#text').html(region);
		}	
    });
}