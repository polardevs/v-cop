<?php
function chkActiveMenuCompany($urlMenu,$menu){
	if ($menu == $urlMenu) 	echo "active";
}
?>
<nav class="navbar navbar-default nav-company visible-xs" role="navigation">
<!-- 	<div class="container"> -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand <?php chkActiveMenuCompany($this->uri->segment(1),'company-find');?>" href="<?php echo site_url(); ?>company-find" ><?php echo lang('COMPANY_MENU_FIND');?></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="hidden">
					<a href="<?php echo site_url(); ?>company-apprentice" class="<?php chkActiveMenuCompany($this->uri->segment(1),'company-apprentice');?>">
						<?php echo lang('COMPANY_MENU_APPRENTICE');?>
					</a>
				</li>
				<li><a href="<?php echo site_url(); ?>position" class="<?php chkActiveMenuCompany($this->uri->segment(1),'position');?>"><?php echo lang('COMPANY_MENU_POSITION');?></a></li>
				<li><a href="<?php echo site_url(); ?>favorites-persons" class="<?php chkActiveMenuCompany($this->uri->segment(1),'favorites-persons');?>"><?php echo lang('COMPANY_MENU_FAVORITES_PERSONS');?></a></li>
				<li><a href="<?php echo site_url(); ?>profile-company" class="<?php chkActiveMenuCompany($this->uri->segment(1),'profile-company');?>"><?php echo lang('COMPANY_MENU');?></a></li>
				
				
	
				<li class="visible-xs"><a href="<?php echo site_url(); ?>">TH</a></li>
				<li class="visible-xs"><a href="<?php echo site_url(); ?>"><?php echo lang('MAIN_MENU_LOGOUT');?></a></li>
			</ul>
		</div>
<!-- 	</div> -->
</nav>

<ul class="nav nav-pills nav-stacked nav-company hidden-xs">
	<li><a href="<?php echo site_url(); ?>company-find" class="<?php chkActiveMenuCompany($this->uri->segment(1),'company-find');?>" ><?php echo lang('COMPANY_MENU_FIND');?></a></li>
	<li class="hidden"><a href="<?php echo site_url(); ?>company-apprentice" class="<?php chkActiveMenuCompany($this->uri->segment(1),'company-apprentice');?>"><?php echo lang('COMPANY_MENU_APPRENTICE');?></a></li>
	<li><a href="<?php echo site_url(); ?>position" class="<?php chkActiveMenuCompany($this->uri->segment(1),'position');?>"><?php echo lang('COMPANY_MENU_POSITION');?></a></li>
	<li><a href="<?php echo site_url(); ?>favorites-persons" class="<?php chkActiveMenuCompany($this->uri->segment(1),'favorites-persons');?>"><?php echo lang('COMPANY_MENU_FAVORITES_PERSONS');?></a></li>
	<li>
		<a href="<?php echo site_url(); ?>profile-company" class="<?php chkActiveMenuCompany($this->uri->segment(1),'profile-company');?>">
		<?php echo lang('COMPANY_MENU');?>
		</a>
	</li>
	
	
</ul>