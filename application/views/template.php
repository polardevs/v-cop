<!doctype html>
<html>
<head>
    <title><?php echo $this->template->title->default("Default title"); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->template->description; ?>">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo site_url();?>assets/common/images/icon_web.ico">
    
    <?php echo $this->template->meta; ?>
  	<?php header("Cache-Control: max-age=0; no-cache; no-store; must-revalidate"); ?>
    <?php echo css_asset("bootstrap.min.css", "bootstrap"); ?>
    <?php echo css_asset("bootstrap-theme.min.css", "bootstrap"); ?>
    <?php echo css_asset("default-styles.css", "common"); ?>
    <?php echo css_asset("font-style.css", "common"); ?>
    <?php echo css_asset("font-awesome.min.css", "common"); ?>

	<?php echo js_asset('jquery/jquery.min.js','common');?>
	<link href='https://fonts.googleapis.com/css?family=Kanit:300&subset=thai,latin' rel='stylesheet' type='text/css'>
 <!-- ### Datatable ###     -->
    <?php echo css_asset("datatables/dataTables.bootstrap.css", "plugins"); ?>

	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
	<?php echo js_asset('datatables/dataTables.bootstrap.min.js','plugins');?>

	<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>
<!-- ### Datatable ###     -->

<!-- ### VALIDATOR ### -->
	<?php echo js_asset('validate/jquery.validate.min.js','plugins');?>

<!-- ### DATETIMEPICKER ### -->
    <?php echo css_asset("bootstrap_datetimepicker/bootstrap-datetimepicker.min.css", "plugins"); ?>
	<?php echo js_asset('bootstrap_datetimepicker/moment.js','plugins');?>
	<?php echo js_asset('bootstrap_datetimepicker/th.js','plugins');?>
	<?php echo js_asset('bootstrap_datetimepicker/bootstrap-datetimepicker.js','plugins');?>

<!-- ### FILE STYLE ### -->
	<?php echo js_asset('filestyle/bootstrap-filestyle.js','plugins');?>

<!-- ### TOOLTIP ### -->
	<?php echo css_asset('tooltipster-master/tooltipster.css','plugins');?>
	<?php echo js_asset('tooltipster-master/jquery.tooltipster.js','plugins');?>

<!-- ### SELECT2 ### -->
	<?php echo css_asset('select2/select2.css','plugins');?>
	<?php echo js_asset('select2/select2.full.min.js','plugins');?>

	<?php echo css_asset('style.css','common');?>
	<?php echo css_asset('loader.css','common');?>
	<?php echo css_asset('main.css','common');?>

    <link href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css"/>
	
	<?php echo js_asset('bootstrap_pagination/bootstrap-paginator.js','plugins');?>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>

    <?php echo $this->template->stylesheet; ?>
    <link href='https://fonts.googleapis.com/css?family=Prompt:300&subset=thai,latin' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jqvmap/jquery.vmap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/banner/appendJobList.js"></script>
    
</head>

<body style="<?php echo ($this->uri->segment(1)=='showresume')? 'background-color: #F5F5F5':'';?>">

<div id="wrapper">
	<div class="loading" style="display:none">
		<div class="loader"></div>
	</div>
	<div class="chat-box-background" style="display:none">
	</div>

	<div id="header">
	<?php echo $this->template->header; ?>
	</div>
	<div id="content">
		<?php echo $this->template->content; ?>
	</div>

	<?php echo $this->template->footer; ?>
</div>
	<?php echo js_asset('jquery/jquery-ui.min.js','common');?>
	<?php echo js_asset('bootstrap.min.js','bootstrap');?>
	<?php echo js_asset('theme.js','common');?>
	<?php echo js_asset('masonry/masonry.pkgd.min.js','plugins');?>
	<?php echo js_asset('function.js','common');?>

<?php echo $this->template->javascript; ?>
	
<script type="text/javascript">
	$('[data-toggle="tooltip"]').tooltip();
	tooltipster();
	var width = $( window ).width();
	if(width < 768){
		$("nav.navbar").addClass("navbar-fixed-top");
		$(".banner-top").addClass("navbar-fixed-top");
	}
	$(window).scroll( function() { 
		var scrolled_val = $(document).scrollTop().valueOf();
		var width = $( window ).width();
		if(width >= 768){
			if(scrolled_val >= 300){
			 	$("nav.navbar").addClass("navbar-fixed-top");
		 	} else {
		 		$("nav.navbar").removeClass("navbar-fixed-top");
		 	}
		}
	});
</script>
</body>
</html>