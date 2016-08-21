<div class="container">
	<h2 class="text-center">ข้อมูลสถิติ</h2>
	<div class="row">
		<div class="col-sm-3 col-xs-12 center-block">
			<a href="<?php echo base_url()?>school">
				<div class="circle">
					<h6 class="vertical-align" id="CountStat-schoolCount"></h6>
				</div>
			</a>
			<h6 class="text-center" style="padding-top: 10px;">
				<?php echo lang('ALL_SCHOOL') ?>
			</h6>
		</div>
		<div class="col-sm-3 col-xs-12 center-block" >
			<div class="circle">
				<h6 class="vertical-align" id="CountStat-studentCount"></h6>
			</div>
			<h6 class="text-center" style="padding-top: 10px;">
				<?php echo lang('ALL_STUDENT') ?>
			</h6>
		</div>
		<div class="col-sm-3 col-xs-12 center-block" >
			<a href="<?php echo base_url('corp');?>">
				<div class="circle">
					<h6 class="vertical-align" id="CountStat-corpCount"></h6>
				</div>
			</a>
			<h6 class="text-center" style="padding-top: 10px;">
				<?php echo lang('ALL_CORP') ?>
			</h6>
		</div>
		<div class="col-sm-3 col-xs-12 center-block" >
			<a href="<?php echo base_url('report/student');?>">
				<div class="circle">
					<h6 class="vertical-align" id="CountStat-regSuccessCount"></h6>
				</div>
			</a>
			<h6 class="text-center" style="padding-top: 10px;">
				<?php echo lang('ALL_STUDENT_ALREADY') ?>
			</h6>
		</div>
	</div>
</div>