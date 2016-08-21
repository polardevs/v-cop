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
				<h3>
					<?php echo lang('STUDENT_MENU_PASSWORD') ?>
				</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
						<h2><?php echo lang('STUDENT_MENU_PASSWORD') ?></h2>
						<hr>
					</div>
			</div>

			<form id="myform" method="POST" action="javascript:savepassword();">
				<input type="hidden" id="prefixId" name="prefixId">
				<input type="hidden" class="form-control" id="name" name="name">
				<input type="hidden" class="form-control" name="lastname">
				<input type="hidden" class="form-control" name="birthdate">
				<input type="hidden" class="form-control" name="email">
				<input type="hidden" name="token" value="<?php echo base64_encode($userdata['user_id'])?>">

				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right">
							<?php echo lang('FORM_PASSWORD');?> :
						</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" name="password">
							<small style="display: block;"><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_PASSWORD') ?> </small>
						</div>
					</div>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right">
							<?php echo lang('FORM_CONFIRM_PASSWORD');?> :
						</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="confirmPassword">
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-blue pull-right" id="save" >
					<?php echo lang('BTN_SAVE');?>
				</button> 
			</form>
		</div>
	</div>
	
</div>

<script>
$(document).ready(function() {
	$( "#myform" ).validate({
  		rules: {
		    name :{
				required: true,
				maxlength: 256	
			},
			lastname:{
				required: true,
				maxlength: 256
			},
			email :{
				required: true,
				maxlength: 512,
				email: true
			},
			password :{
				minlength:8,
				maxlength: 128
			},
			birthdate: "required",
			confirmPassword :{
				equalTo: "#myform #password"
			}
	  	}
	});

	$( "input[name ='birthdate']" ).datetimepicker({
	 	format: "DD-MM-YYYY",
	 	defaultDate: new Date()
	});

	var user_id = '<?php echo $this->session->userdata['user_id'];?>';
	var parameters ={
		token: btoa(user_id),
		userId: user_id
	}
	var api = $.post( '<?php echo $_server?>getStudentDetail.do',parameters);
	api.done(function( data ) {
		console.log(data);
		if(data.responseCode != 200){
			window.location = '<?php echo site_url();?>auth/logout';
		}
		var StudentDetail = data.data;
		$( "input[name ='prefixId']" ).val( StudentDetail.prefixId);
		$( "input[name ='name']" ).val( StudentDetail.firstname);
		$( "input[name ='lastname']" ).val( StudentDetail.lastname);
		$( "input[name ='birthdate']" ).val( StudentDetail.birthdate);
		$( "input[name ='email']" ).val( StudentDetail.email);
	});
});
function savepassword() {
	var submit = $( "form#myform").serializeArray();
	var editUserProf = $.post( '<?php echo $_server?>editUserProf.do?',submit);
	editUserProf.done(function( data ) {
		if (data.responseCode == 200){
			window.location = '<?php echo site_url();?>student';
		}
	});
}
</script>


