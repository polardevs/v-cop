<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h2>ข่าวสารและกิจกรรม</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 margin-t-20">
			<h4 style="display: inline-block;margin: 10px 0px 0px;">
				<a href="<?php echo base_url('news');?>">
					<?php echo lang('MAIN_NEWS_TITLE');?>
				</a>
			</h4>
			<a href="<?php echo base_url('news');?>" class="btn btn-info pull-right">
				<?php echo lang('BTN_VIWEALL');?>
			</a>
			<hr style="margin-top: 15px;">
			<div class="row">
				<div class="col-sm-6">
					<div class="thumb" id="article-img"></div>
					<!-- <img src="<?php echo base_url('assets/common/images/main3.png');?>" class="img-responsive" /> -->
				</div>
				<div class="col-sm-6" style="height: 180px;">
					<h6 id="article-title" class="news-title"></h6>
					<div id="article-detail"></div>
					<div id="article-readmore"></div>
					<span class="publishdate" id="article-updatedDate"></span>
				</div>
			</div>
		</div>
		<div class="col-sm-6 margin-t-20">
			<h4 style="display: inline-block;margin: 10px 0px 0px;">
				<a href="<?php echo base_url('activity');?>">
					<?php echo lang('MAIN_ACTIVITY_TITLE');?>
				</a>
			</h4>
			<a href="<?php echo base_url('activity');?>" class="btn btn-info pull-right">
				<?php echo lang('BTN_VIWEALL');?>
			</a>
			<hr style="margin-top: 15px;">
			<div class="row">
				<div class="col-sm-6">
					<div class="thumb" id="activity-img"></div>
				</div>
				<div class="col-sm-6" style="height: 180px;">
					<h6 id="activity-title" class="news-title"></h6>
					<div id="activity-detail"></div>
					<div id="activity-readmore"></div>
					<span class="publishdate" id="activity-updatedDate"></span>
				</div>
			</div>
		</div>
	</div>
</div>