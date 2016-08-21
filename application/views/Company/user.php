<div class="container body-company">
	<div class="row">
		<div class="col-sm-3">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-12">
					<h2>
						<?php echo lang('STUDENT_MENU_PASSWORD') ?>
					</h2>
					<hr>
				</div>
			</div>
			<form id="myform" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="prefixId" value="<?php echo $userdata['prefixId'] ?>">
				<input type="hidden" name="name" value="<?php echo $userdata['contactName'] ?>">
				<input type="hidden" name="lastname" value="<?php echo $userdata['contactLastname'] ?>">
				<input type="hidden" name="email" value="<?php echo $userdata['email'] ?>">
				<input type="hidden" name="token" value="<?php echo base64_encode($userdata['user_id'])?>">
				<input type="hidden" name="birthdate" value="<?php echo $userdata['birthdate'] ?>">	
			
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label text-right">
							<?php echo lang('NEW_PASSWORD');?> :
						</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="col-sm-8 col-sm-offset-3">
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
				<span class="btn btn-blue pull-right" id="save" value="">
					<?php echo lang('BTN_SAVE');?>
				</span>
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
				confirmPassword :{
					equalTo: "#myform #password"
				}
		  	}
		});

		$('#save').click(function(event) {
			var submit = $( "form#myform").serializeArray();
			var editUserProf = $.post( '<?php echo $_server?>editUserProf.do?',submit);
			editUserProf.done(function( data ) {
				if (data.responseCode == 200){
					window.location = '<?php echo site_url();?>profile-company';
				}
			});
		});
	});
</script>