<div class="container">
	<div class="row ">
		<div class="col-sm-12 sJob">
			<div class="col-sm-9 padding-t-20 color-f">
				<ul class="checkcc">
					<li>
					    <input type="radio" id="find-job" name="selector" checked>
					    <label for="find-job">ค้นหาตำแหน่งงานว่าง</label>
					    <div class="check"></div>
					</li>
					<li>
					    <input type="radio" id="find-person" name="selector">
					    <label for="find-person">ค้นประวัติคนหางาน</label>
					    <div class="check"></div>
					</li>
				</ul>
			</div>
			<div class="col-sm-12">
				<form name="search" class="s-Job" id="search" method="POST" action ="<?php echo base_url('sjobs')?>"  enctype="multipart/form-data">
					<?php  $this->load->view('/banner/FormSearchjobs'); ?>
				</form>
				<form name="search" class="s-Person" style="display: none;" id="search" method="POST" action ="<?php echo base_url('spersons')?>"  enctype="multipart/form-data">
					<?php  $this->load->view('/banner/FormSearchPerson'); ?>
				</form>
			</div>
		</div>
	</div>
</div>