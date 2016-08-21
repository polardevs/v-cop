<?php
	function chkActiveMenu($urlMenu,$menu) {
		if ($menu == $urlMenu) 	echo "active";
	}
?>

<nav class="navbar navbar-default visible-xs" role="navigation">
<!-- 	<div class="container"> -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand <?php chkActiveMenu($this->uri->segment(1),'company-find');?>"><?php echo lang('STUDENT_MENU');?></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav menu-stydent ">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="true"><i class="fa fa-pencil-square-o"></i> <?php echo lang('STUDENT_MENU_PROFILE');?> <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li>
							<a href="<?php echo site_url(); ?>student" class="<?php chkActiveMenu ($this->uri->segment(1),'student');?>"><?php echo lang('STUDENT_MENU_PROFILE_UPDATE_STATUS');?></a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>student-profile" class="<?php chkActiveMenu ($this->uri->segment(1),'student-profile');?>"><?php echo lang('STUDENT_MENU_PROFILE_UPDATE');?></a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>work-history" class="<?php chkActiveMenu ($this->uri->segment(1),'work-history');?>"><?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?></a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>train-history" class="<?php chkActiveMenu ($this->uri->segment(1),'train-history');?>"><?php echo lang('STUDENT_MENU_PROFILE_HISTORY_TRAIN');?></a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>portfolio-student" class="<?php chkActiveMenu ($this->uri->segment(1),'portfolio-student');?>"><?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?></a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>transcript-student" class="<?php chkActiveMenu ($this->uri->segment(1),'transcript-student');?>"><?php echo lang('FORM_TRANSCRIPT');?></a>
						</li>
	                </ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="true">
						<i class="fa fa-pencil-square-o"></i> 
						<?php echo lang('STUDENT_MENU_INTERESING_JOB');?> 
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li>
							<a href="<?php echo site_url(); ?>search-jobs" class="<?php chkActiveMenu ($this->uri->segment(1),'search-jobs');?>">
								<?php echo lang('STUDENT_MENU_JOB_FIND');?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>quick-job" class="<?php chkActiveMenu ($this->uri->segment(1),'quick-job');?>">
								<?php echo lang('STUDENT_MENU_INTERESING_QUICK_JOB');?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>new-job" class="<?php chkActiveMenu ($this->uri->segment(1),'new-job');?>">
								<?php echo lang('STUDENT_MENU_INTERESING_NEW_JOB');?>
							</a>
						</li>
	                </ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="true">
						<i class="fa fa-pencil-square-o"></i> 
						<?php echo lang('STUDENT_MENU_JOB');?> 
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						
						<li>
							<a href="<?php echo site_url(); ?>apply-job" class="<?php chkActiveMenu ($this->uri->segment(1),'apply-job');?>">
							<?php echo lang('STUDENT_MENU_JOB_APPLY_JOB');?>
							</a>
						</li>
						<li class="hidden">
							<a href="<?php echo site_url(); ?>apprentice" class="<?php chkActiveMenu ($this->uri->segment(1),'apprentice');?>">
								<?php echo lang('STUDENT_MENU_JOB_APPRENTICE');?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>mailbox" class="<?php chkActiveMenu ($this->uri->segment(1),'mailbox');?>">
								<?php echo lang('STUDENT_MENU_JOB_MAILBOX');?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>favorites-jobs" class="<?php chkActiveMenu ($this->uri->segment(1),'favorites-jobs');?>"><?php echo lang('STUDENT_MENU_JOB_PORTFOLIO');?>
							</a>
						</li>
	        		</ul>
				</li>
				<li>
					<a href="<?php echo site_url();?>auth/logout">
						<?php echo lang('MAIN_MENU_LOGOUT');?>
					</a>
				</li>	
			</ul>				
		</div>
</nav>

<ul class="nav nav-pills nav-stacked hidden-xs">
	<li><i class="fa fa-pencil-square-o"></i> <?php echo lang('STUDENT_MENU_PROFILE');?> 
		<ul class="menu-stydent">
			<li>
				<a href="<?php echo site_url(); ?>student" class="<?php chkActiveMenu ($this->uri->segment(1),'student');?>">
					<?php echo lang('STUDENT_MENU_PROFILE_UPDATE_STATUS');?> 
				</a>
			</li>
			<li>
				<a href="<?php echo site_url(); ?>student-profile" class="<?php chkActiveMenu ($this->uri->segment(1),'student-profile');?>">
					<?php echo lang('STUDENT_MENU_PROFILE_UPDATE');?> 
				</a>
			</li>
			<li>
				<a href="<?php echo site_url(); ?>work-history" class="<?php chkActiveMenu ($this->uri->segment(1),'work-history');?>">
					<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_WORK');?> 
				</a>
			</li>
			<li>
				<a href="<?php echo site_url(); ?>train-history" class="<?php chkActiveMenu ($this->uri->segment(1),'train-history');?>">
					<?php echo lang('STUDENT_MENU_PROFILE_HISTORY_TRAIN');?> 
				</a>
			</li>
			<li>
				<a href="<?php echo site_url(); ?>portfolio-student" class="<?php chkActiveMenu ($this->uri->segment(1),'portfolio-student');?>">
					<?php echo lang('STUDENT_MENU_PROFILE_PORTFOLIO');?> 
				</a>
			</li>
			<li>
				<a href="<?php echo site_url(); ?>transcript-student" class="<?php chkActiveMenu ($this->uri->segment(1),'transcript-student');?>"><?php echo lang('FORM_TRANSCRIPT');?></a>
			</li>
		</ul>
	</li>
	<li><i class="fa fa-pencil-square-o"></i> <?php echo lang('STUDENT_MENU_INTERESING_JOB');?>
		<ul class="menu-stydent">
			<li><a href="<?php echo site_url(); ?>search-jobs" class="<?php chkActiveMenu ($this->uri->segment(1),'search-jobs');?>"><?php echo lang('STUDENT_MENU_JOB_FIND');?></a></li>
			<li><a href="<?php echo site_url(); ?>quick-job" class="<?php chkActiveMenu ($this->uri->segment(1),'quick-job');?>"><?php echo lang('STUDENT_MENU_INTERESING_QUICK_JOB');?></a></li>
			<li><a href="<?php echo site_url(); ?>new-job" class="<?php chkActiveMenu ($this->uri->segment(1),'new-job');?>"><?php echo lang('STUDENT_MENU_INTERESING_NEW_JOB');?></a></li>
		</ul>
	</li>
	<li><i class="fa fa-pencil-square-o"></i> <?php echo lang('STUDENT_MENU_JOB');?>
		<ul class="menu-stydent">
			<li><a href="<?php echo site_url(); ?>apply-job" class="<?php chkActiveMenu ($this->uri->segment(1),'apply-job');?>"><?php echo lang('STUDENT_MENU_JOB_APPLY_JOB');?></a></li>
			<li class="hidden"><a href="<?php echo site_url(); ?>apprentice" class="<?php chkActiveMenu ($this->uri->segment(1),'apprentice');?>"><?php echo lang('STUDENT_MENU_JOB_APPRENTICE');?></a></li>
			<li><a href="<?php echo site_url(); ?>mailbox" class="<?php chkActiveMenu ($this->uri->segment(1),'mailbox');?>"><?php echo lang('STUDENT_MENU_JOB_MAILBOX');?></a></li>
			<li><a href="<?php echo site_url(); ?>favorites-jobs" class="<?php chkActiveMenu ($this->uri->segment(1),'favorites-jobs');?>"><?php echo lang('STUDENT_MENU_JOB_PORTFOLIO');?></a></li>
		</ul>
	</li>

	<li>
		<ul class="menu-stydent">
			<li><a href="<?php echo site_url();?>auth/logout"><?php echo lang('MAIN_MENU_LOGOUT');?></a></li>
		</ul>
	</li>
</ul>
