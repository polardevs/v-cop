<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>JQVMap - Iran Map</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

    <link href="assets/plugins/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jqvmap/jquery.vmap.js"></script>

    <script>
      jQuery(document).ready(function () {
        var CountStat = $.post('http://192.168.1.223:9080/vcop/job/api/getProvinceStatMap.do');
		CountStat.done(function( data ) {		
			vectorMap(data);
		});
		function vectorMap(data){
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
					console.log(element);
					console.log('code : '+ code + 'region : '+ region);
					$('#text').html(region);
				}	
		    });
		}
      });
    </script>
  </head>
  <body>
    <div id="vmap" style="width: 300px; height: 300px;"></div>
    <div id="text"></div>
  </body>
</html>

