<div class="container body-student">
	<div class="row">
		<div class="col-sm-3" style="border-right: 2px solid #ccc">
			<div class="bg-info hidden-xs">
				<h3><?php echo lang('STUDENT_MENU');?></h3>
			</div>
			<?php  $this->load->view('navbar-student');?>
		</div>
		<div class="col-sm-9">
			<div class="bg-gray">
				<h3><?php echo lang('STUDENT_MENU_JOB_APPRENTICE');?></h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2 style="display: inline-block;">รายการการฝึกงาน</h2>
					<button class="btn-gray btn center-block pull-right add_company" style="margin-top: 15px;"><?php echo lang('FORM_APPLY_CLEAR');?></button>
					<hr style="margin-top: 5px;">
				</div>
				<div class="col-sm-12">
					<?php  
					for ($i=0; $i < 2; $i++) { 
					?>
					<div class="news-announce" style="margin-bottom: 20px;">
						<h3>IT Application Development <small class="new pull-right">NEW</small></h3>
						<div class="row">
							<div class="col-sm-8 announce-student">
								บริษัท ซีพีแอล เอ็นเตอร์ไพรส์ จำกัด
							</div>
							<div class="col-sm-4 text-right announce-student">
								<span class="h3">จำนวน <span class="p1"> 10 อัตรา</span></span>
							</div>
							
							<div class="col-sm-8 announce-student">
								<?php echo lang('FORM_PROVINCE');?>กรุงเทพ
							</div>
							<div class="col-sm-4 text-right announce-student">
								<span class="h3"><?php echo lang('FORM_SWORK_SALARY');?> <span class="p1"> ตามตกลง</span></span>
							</div>
								
							<div class="col-sm-8 announce-student">
								<span class="createDt">ประกาศ 04-02-2558 เข้าชม 0</span>
							</div>
							<div class="col-sm-4 text-right announce-student">
								<div class="pull-right detail">
									<span class="detail"><?php echo lang('FORM_PORT_DESC');?></span>
									<span class="label label-default"><i class="fa fa-plus"></i></span>
									<span class="label label-default"><i class="fa fa-star p1"></i></span>
								</div>
							</div>
								
						</div>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#work-history"); //Fields wrapper
    var add_button      = $(".add_company"); //Add button ID
    var filed = $('#work-history');
  
    
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var i;
            var text = '';
            for (i = 2559; i > 2540; i--) {
                text +="<option>"+ i + "</option>";
            }
            $(wrapper).append(
            		'<div class="form-horizontal" id="work-history">'+
            		'<div class="col-sm-12"> <hr> </div>'+
					'<div class="form-group">'+
						'<label class="col-sm-3 control-label text-right">ชื่อ :</label>'+
						'<div class="col-sm-4"><input type="text" class="form-control" value=""></div>'+
					'</div>'+
				
					'<div class="form-group">'+
						'<label class="col-sm-3 control-label text-right">เริ่มจาก :</label>'+
						'<div class="col-sm-2">'+
							'<select class="form-control">'+
								'<option>มกราคม</option>'+
								'<option>กุมภาพันธ์</option>'+
								'<option>มีนาคม</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-sm-2">'+
							'<select class="form-control">'+
							text+
							'</select>'+
						'</div>'+
						'<label class="col-sm-1 control-label text-right">ถึง :</label>'+
						'<div class="col-sm-2">'+
							'<select class="form-control">'+
								'<option>มกราคม</option>'+
								'<option>กุมภาพันธ์</option>'+
								'<option>มีนาคม</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-sm-2">'+
							'<select class="form-control">'+
							text+
							'</select>'+
						'</div>'+
					'</div>'+
					
					'<div class="form-group">'+
						'<label class="col-sm-3 control-label text-right">สถาบัน :</label>'+
						'<div class="col-sm-4"><input type="text" class="form-control" value=""></div>'+
					'</div>'+
					
					'<div class="form-group">'+
						'<label class="col-sm-3 control-label text-right">หลักสูตร :</label>'+
						'<div class="col-sm-4"><textarea class="form-control" rows="3" placeholder=""></textarea></div>'+
					'</div>'+
				'</div>'
				
                    ); //add input box

        }
    });
});
</script>