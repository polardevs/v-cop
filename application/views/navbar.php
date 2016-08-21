<nav class="navbar navbar-default " role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand visible-xs" href="<?php echo site_url(); ?>">
				<?php echo lang('MAIN_MENU_HOME');?>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="hidden-xs">
					<a href="<?php echo site_url(); ?>" class="padding-l-0">
						<?php echo lang('MAIN_MENU_HOME');?>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>dekdeeAcheeva">
						<?php echo lang('MAIN_MENU_DEK_DEE');?>
					</a>
				</li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo lang('MAIN_MENU_FIND_PERSON');?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url(); ?>news"><?php echo lang('ARTICLE'); ?></a></li>
						<li><a href="<?php echo site_url(); ?>analysis-report"><?php echo lang('REPORT') ?></a></li>
						<li><a href="<?php echo site_url(); ?>download"><?php echo lang('DOWNLOAD') ?></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo lang('LINK') ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php  
							foreach ($getLink->data as $getLinks) {
								?>
								<li>
									<a href="<?php echo $getLinks->url;?>" target="_blank"> 
										<?php echo $getLinks->title ?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>staft">
						<?php echo lang('MENU_STAFT') ?>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>vcop-rank">
						<?php echo lang('RANK') ?>
					</a>
				</li>
				<li class="visible-xs"><a href="<?php echo site_url(); ?>">TH</a></li>
			<?php
				if (isset($userdata['name']) ) {
			?>
				<li class="dropdown visible-xs">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$userdata['name']?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url().$userdata['res_url']?>"><?php echo lang('MAIN_MENU_PROFILE');?></a></li>
						<li><a href="<?php echo site_url();?>auth/logout"><?php echo lang('MAIN_MENU_LOGOUT');?></a></li>
					</ul>
				</li>

			<?php
				}else{
			?>
				<li class="visible-xs">
					<a href="<?php echo site_url();?>register">
						<?php echo lang('MAIN_MENU_REGISTER');?>
					</a>
				</li>
				<li class="dropdown visible-xs">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang('MAIN_MENU_LOGIN');?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<form id="home-mobile-login" class="navbar-form navbar-left validate-form" method="post" role="form" style="width: 100%;" novalidate="novalidate">								
								<input type="hidden" name="lang" value="th">
	      
								<div class="form-group">
									<div class="col-sm-12 controls">
										<label for="username" class="control-label">
											<h3>
												<?php echo lang('MAIN_MENU_LOGIN');?>
											</h3>
										</label>
										<input type="text" class="form-control login" id="username-mobile" name="username" placeholder="Username" data-rule-required="true" style="width: 290px">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6 controls">
										<input type="password" class="form-control login" id="password-mobile" name="password" placeholder="Password" data-rule-required="true" style="width: 290px">
									</div>
								</div>
  									
								<div class="col-sm-12 text-center" style="margin-bottom: 10px;">
									<div id="tu-direct-login-error" class="text-red"></div>
								</div>
								<div class="col-sm-6 controls">
									<a href="<?php echo site_url();?>forgot"> 
										<?php echo lang('FORGOT_PASSWORD');?>
									</a>
								</div>
								<div class="col-sm-6 controls">
									<a href="http://vec.dealzep.com:8080/vcop/"> 
										สถานศึกษาเข้าสู่ระบบ
									</a>
								</div>
								<div class="col-sm-6 controls hidden">
									<input type="checkbox"/><?php echo lang('REMEMBERME');?>
								</div>
								<div class="col-sm-6">
									<button type="submit" class="btn btn-block btn-warning tu-direct-login">
										<?php echo lang('MAIN_MENU_LOGIN');?>
									</button>
								</div>			  	
							</form>
						</li>
					</ul>
				</li>	
			<?php
				}
			?>			
			</ul>
		</div>
	</div>
</nav>