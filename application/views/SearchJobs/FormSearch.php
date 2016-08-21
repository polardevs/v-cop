<div class="sJob">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="color-f"><?php echo lang('MAIN_JOB_SEARCH');?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-6" style="padding-top: 15px; padding-right: 7px;">
					<input type="hidden" name="post" class="form-control" value="post">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-search"></i></div>
						<input type="text" name="keyword" class="form-control" placeholder="<?php echo lang('MAIN_JOB_COMPANY_NAME');?>">
					</div>
				</div>
				<div class="col-sm-6" style="padding-top: 15px; padding-right: 7px;">
					<div class="input-group c-search">
						<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
						<select class="form-control selectProvince select2" name ="provinceId">
							<option value=""><?php echo lang('MAIN_JOB_LOCATION');?></option>
						<?php 
						foreach ($Province as $Provinces) {
							echo "<option value='".$Provinces->provinceId."'>";
							echo $Provinces->name;
							echo "</option>";
						}
						?>										
						</select>
					</div>
				</div>
				<div class="col-sm-6" style="padding-top: 15px; padding-right: 7px;">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
						<select class="form-control" name="jobTypeId">
							<option value=""><?php echo lang('MAIN_JOB_EMPLOYMENT_TYPE');?></option>
						<?php 

						foreach ($JobType as $JobTypes) {
							echo "<option value='".$JobTypes->jobTypeId."'>";
							echo $JobTypes->name;
							echo "</option>";
						}
						?>
						</select>
					</div>
				</div>
				<div class="col-sm-6" style="padding-top: 15px; padding-right: 7px;">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-list-ul"></i>
						</div>
						<select class="form-control" name="levelId" id="levelId">
							<option value=""><?php echo lang('FORM_GRADE');?></option>
						<?php 

						foreach ($Level as $Levels) {
							echo "<option value='".$Levels->levelId."'>";
							echo $Levels->name;
							echo "</option>";
						}
						?>
						</select>
						<!-- <input type="text" class="form-control" placeholder="<?php echo lang('MAIN_JOB_TYPE');?>"> -->
					</div>
				</div>
				<div class="col-sm-12 hidden-xs" style="padding-top: 15px;">
					<p class="pull-right color-f ">&nbsp;</p>
				</div>
				<!-- <div class="col-sm-12" style="padding-top: 53px;"></div> -->
			</div>
		</div>
		<div class="col-sm-3" style="padding-top: 15px;">
			<button type="submit" class="btn btn-warning" style="width: 100%;"><b><?php echo lang('BTN_SEARCH');?></b></button>
		</div>

	</div>
</div>