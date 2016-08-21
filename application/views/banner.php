<div class="banner" id="banner">
	<img src="<?php echo base_url('assets/common/images/banner.jpg');?>" class="img-responsive center-block img-banner" />
</div>
<div class="Job">
	<?php  $this->load->view('/banner/Job'); ?>
</div>
<div class="map padding-b-20">
	<?php  $this->load->view('/banner/map'); ?>
</div>
<div class="success">
	<?php  $this->load->view('/banner/stat'); ?>
</div>
<div class="work">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2 style="display: inline-block;">ตำแหน่งว่างงานล่าสุด</h2>
				<form method="POST" action="<?php echo base_url('sjobs')?>" class="pull-right" style="margin-top: 20px; display: inline-block;">
					<input type="hidden" name="post" value="post">
					<button class="btn btn-info pull-right">
						<?php echo lang('BTN_VIWEALL');?>
					</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo base_url('assets/common/images/pic_left.png');?>" class="img-responsive">
			</div>
			<div class="col-sm-8">
				<div class="row tab-content" id="JobList"></div>
			</div>
		</div>
	</div>
</div>

<div class="News">
	<?php  $this->load->view('/banner/news'); ?>
</div>

<script type="text/javascript" src="assets/plugins/jqvmap/jquery.vmap.js"></script>
<script type="text/javascript" src="assets/banner/job.js"></script>
<script type="text/javascript" src="assets/banner/map.js"></script>
<script type="text/javascript" src="assets/banner/stat.js"></script>
<script type="text/javascript" src="assets/banner/work.js"></script>
<script type="text/javascript" src="assets/banner/news.js"></script>
<script>
	$(document).ready(function() {
		parameterJob = {
			MAIN_SPERSON_SCHOOL :'<?php echo lang('MAIN_SPERSON_SCHOOL') ?>',
			MAIN_SPERSON_COLLEGE :'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>',
			_server :'<?php echo $_server?>',
			base_url : '<?php echo base_url() ?>',
		}
		scriptJob(parameterJob);

		parameterMap = {
			MAIN_SPERSON_SCHOOL :'<?php echo lang('MAIN_SPERSON_SCHOOL') ?>',
			MAIN_SPERSON_COLLEGE :'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>',
			_server :'<?php echo $_server?>',
			base_url : '<?php echo base_url() ?>',
		}
		scriptMap(parameterMap);

		parameterStat = {
			MAIN_SPERSON_SCHOOL :'<?php echo lang('MAIN_SPERSON_SCHOOL') ?>',
			MAIN_SPERSON_COLLEGE :'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>',
			_server :'<?php echo $_server?>',
			base_url : '<?php echo base_url() ?>',
		}
		scriptStat(parameterStat);

		parameterWork = {
			MAIN_SPERSON_SCHOOL :'<?php echo lang('MAIN_SPERSON_SCHOOL') ?>',
			MAIN_SPERSON_COLLEGE :'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>',
			_server :'<?php echo $_server?>',
			base_url : '<?php echo base_url() ?>',
		}
		scriptWork(parameterWork);

		parameterNews = {
			MAIN_SPERSON_SCHOOL :'<?php echo lang('MAIN_SPERSON_SCHOOL') ?>',
			MAIN_SPERSON_COLLEGE :'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>',
			READMORE :'<?php echo lang('MAIN_NEWS_READMORE') ?>',
			_server :'<?php echo $_server?>',
			base_url : '<?php echo base_url() ?>',
		}
		scriptNews(parameterNews);

		
		$('#PprovinceId').change(function(event) {
			getSchool("<?php echo $_server?>","<?php echo lang('MAIN_SPERSON_SCHOOL') ?>",schoolId,$('#PprovinceId').val(),'<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');
		});
		getSchool("<?php echo $_server?>","<?php echo lang('MAIN_SPERSON_SCHOOL') ?>",schoolId,'','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');

		

	    $('#levelIdP').change(function(event) {
	    	$("#subjectId").select2("val", "");
			changeSubject($('#levelIdP').val(),'<?php echo $_server?>','<?php echo lang('ONLOAD'); ?>','<?php echo lang('MAIN_SPERSON_COLLEGE') ?>');
		});


		
	});	

	
	
</script>