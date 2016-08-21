<div class="sJob" >
	<input type="hidden" name="post" value="post">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="color-f"><?php echo lang('COMPANY_MENU_FIND');?></h2>
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group c-search">
							<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
							<select class="form-control selectProvince select2" name ="provinceId" id="PprovinceId">
								<option value=""><?php echo lang('MAIN_SPERSON_LOCATION');?></option>
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
					<div class="col-sm-6">
						<div class="input-group c-search">
							<div class="input-group-addon"><i class="fa fa-university"></i></div>
							<select class="form-control select2" name="schoolId" id="schoolId">
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-list-ul"></i></div>
							<select class="form-control " name="levelId" id="levelIdP">
								<option value=""><?php echo lang('FORM_GRADE');?></option>
							<?php  
							foreach ($Level as $Levels) {
								echo "<option value='".$Levels->levelId."'>";
								echo $Levels->name;
								echo "</option>";
							}
							?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group c-search">
							<div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
							<select name="subjectId[]" id="subjectId" class="form-control select2" multiple>
							</select>
						</div>
					</div>
					<div class="col-sm-6 search-school" style="display: none;">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-briefcase"></i>
							</div>
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
					<div class="col-sm-6 search-school" style="display: none;">
						<div class="input-group c-search">
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
							<select class="form-control select2" name="endYear">
								<option value=""><?php echo lang('ALL_ENDYEAR') ?></option>
								<?php  
								for ($i=20; $i > 0; $i--) { 
									echo "<option value='";
									echo $i + ((date("Y")-10)+543)."'>";
									echo $i + ((date("Y")-10)+543);
									echo "</option>";
								}
								?>
							</select>
						</div>
					</div>
					
					<div class="col-sm-12 person-more pointer" style="padding-top: 15px;">
						<p class="pull-right color-f ">
							+ <?php echo lang('MAIN_JOB_THOROUGHLY_SEARCH');?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-3" style="padding-top: 15px;">
				<button class="btn btn-warning find" style="width: 100%;"><b><?php echo lang('BTN_SEARCH');?></b></button>
			</div>
		</div>
</div>