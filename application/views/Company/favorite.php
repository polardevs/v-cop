<div class="container body-company">
	<div class="row">
		<div class="col-sm-3">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-3">
					<img class="center-block" src="<?php echo site_url();?>assets/common/images/meta_icons/apple-touch-icon-144x144.png">
				</div>
				<div class="col-sm-9">
					<div class="row" style="min-height: 140px; padding-top: 20px;">
						<div class="col-sm-12">
							<h2>บจก. สกอร์ โซลูชั่น (SCORE SOLUTIONS Co.,Ltd)</h2>
							<i class="fa fa-check-circle" style="color: green;"></i><span>สามารถประกาศหางานได้</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2>รายชื่อผู้สมัครงาน</h2>
					<hr>
				</div>
				<div class="clearfix"></div>
					<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label text-right">ตำแหน่งงาน :</label>
						<div class="col-sm-8">
							<select style="margin-right: 20px;" class="form-control">
								<option>-- เลือก --</option>
								<option>-- ประเภทงานที่สนใจ 1 --</option>
								<option>-- ประเภทงานที่สนใจ 2 --</option>
								<option>-- ประเภทงานที่สนใจ 3 --</option>
							</select>
							
						</div>
					</div>
					

					<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label text-right">ประเภทงาน :</label>
						<div class="col-sm-8">
							<select style="margin-right: 20px;" class="form-control">
								<option>-- เลือก --</option>
								<option>-- ประเภทงานที่สนใจ 1 --</option>
								<option>-- ประเภทงานที่สนใจ 2 --</option>
								<option>-- ประเภทงานที่สนใจ 3 --</option>
							</select>
							
						</div>
					</div>
					

					<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label text-right">วันที่เริ่ม :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control">						
						</div>
					</div>
					

					<div class="form-group col-sm-6">
						<label class="col-sm-4 control-label text-right">วันที่สิ้นสุด :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control">						
						</div>
					</div>
				

				<div class="col-sm-12">
					<a href="<?php echo site_url();?>position/add"><button class="btn btn-blue">เพิ่มประกาศ</button></a>
				</div>
				
				<div class="col-sm-12 " style="padding-top: 15px;">
					<table id="DataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อ-สกุล</th>
								<th>วุฒิการศึกษา</th>
								<th><?php echo lang('ADD_POSITION_POSITION') ?></th>
								<th>ประเภทงาน</th>
								<th>วันที่ติดต่อ</th>
								<th>สถานะการติดต่อ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>							
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	
</div>

<script>
$(document).ready(function() {
	$('#DataTable').DataTable({
		"aoColumnDefs": [ 
			{
				"bSortable": false,
				"aTargets": [ 0 , 1 , 2 , 3 , 4 , 5 , 6 , 7 ] , 
			} , { 
				"aTargets": [ 0 ] ,
				"sWidth": '40px',
				"className": "text-center"
			} , { 
				"aTargets": [ 3 ] ,
				"className": "text-blue"
			} 
		] 		
	});
});
</script>