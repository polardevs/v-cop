<!-- company -->
    <?php echo css_asset("company-style.css", "common"); ?>
<!-- company -->

<div class="banner-top hidden-print">
	<div class="container">
		<div class="row">
			<a href="<?php echo site_url();?>">
				<div class="col-sm-6" style="padding-top: 5px;">
					<img style="display: inline-block;" src="<?php echo site_url();?>assets/common/images/logo_vcop.png" class="img-responsive img-header" />
				</div>
			</a>
			<div class="col-sm-6 line-right hidden-xs" style="padding-top: 5px;">
				<ul class="nav navbar-nav navbar-right company">
					<li class="dropdown">
						<div class="circular-header pull-right dropdown-toggle" data-toggle="dropdown">
							<img id="circular-header">
						</div>
						<ul class="dropdown-menu" role="menu">
							<span class="dropdown-toggle nav-name" ></span>
							<hr style="margin: 10px;">
							<li>
					    		<a href="<?php echo site_url();?>profile-company">
					    			<?php echo lang('STUDENT_MENU_PROFILE');?>
					    		</a>
					    	</li>
					    	<li>
						    	<a href="<?php echo site_url();?>comapany-manage">
						    		<?php echo lang('STUDENT_MENU_PASSWORD');?>
						    	</a>
					    	</li>
					    	<li>
						    	<a href="<?php echo site_url();?>auth/logout">
						    		<?php echo lang('MAIN_MENU_LOGOUT');?>
						    	</a>
					    	</li>
							
						</ul>
					</li>
					<li >
						
						
					</li>
					<!-- <li class="dropdown">
						<span href="" class="dropdown-toggle text-uppercase pull-right margin-t-20" data-toggle="dropdown">
							| <?php echo $lang;?> <span class="caret"></span>
						</span>
						<ul class="dropdown-menu lang" role="menu">
							<li><a class="text-uppercase changeLang">TH</a></li>
							<li><a class="text-uppercase changeLang">EN</a></li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
</div>
<?php  
if( isset($navbar) ){
	$this->load->view('navbar');
}
?>
<script>
	$( document ).ready(function() {
		var _corpId = "<?php echo  $userdata['corpId']?>";
		var api = $.post( '<?php echo $_server?>getCorpDetail.do?corpId='+_corpId);
		api.done(function( data ) {
			console.log(data);
			if(data.responseCode != 200){
				window.location = '<?php echo site_url();?>auth/logout';
			}
			if(!data.data.appFilePath){
				$('.appFilePath').html('<a href="<?php echo site_url();?>profile-company"><?php echo lang('APP_FILE_PATH'); ?></a>');
				$('.btn-appFilePath').attr('disabled', true);

			}
			$('#circular-header').attr("src", data.data.logoFilePath);
			$('.nav-name').html( data.data.contact)
		});

		$(".changeLang").click(function(){
			$lang = $(this).html().toLowerCase();
			var url =window.location.href;
			var data = {lang: $lang };
			var setlang = $.post("<?php echo site_url(); ?>auth/changeLang", data );
			
			setlang.done(function( data ) {
				console.log(data);
				location.reload();
			});
		});
	});

</script>