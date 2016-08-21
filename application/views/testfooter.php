<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>How To Keep Your Footer At The Bottom of The Page - CSSReset.com</title>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jqvmap/jquery.vmap.js"></script>
	<script type="text/javascript" src="assets/jquery.vmap.iraq.js" charset="utf-8"></script>
</head>

<body>
	<div id="vmap" style="width: 612px; height: 600px;"></div>
<script>
	$('#vmap').vectorMap({
		map: 'iraq',
		backgroundColor: '#fff',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		color: '#eee',
		enableZoom: false,
		hoverColor: '#DA251D',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		selectedColor: '#fff',
		showTooltip: true,
		onRegionClick: function (element, code, region) {
			var message = 'You clicked "'
			+ region
			+ '" which has the code: '
			+ code.toUpperCase();

			alert(message);
		}
    });
</script>
</body>

</html>