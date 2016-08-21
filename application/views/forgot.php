<div class="container">
	<h2>ลืมรหัสผ่าน</h2>
	<hr>
	<h4 id="text" class="text-center"></h4>

	<form id="forgotPassword" class="form-horizontal">
		<div class="form-group">
			<label class="control-label text-right col-sm-3">
				<?php echo lang('FORM_EMAIL');?> :
			</label>
			<div class="col-sm-6">
				<input class="form-control" name="email"/>
			</div>
		</div>
		<div class="form-group">
			<div class="clearfix"></div>
			<label class="control-label text-right col-sm-3">
				<?php echo lang('FORM_USERNAME');?> :
			</label>
			<div class="col-sm-6">
				<input class="form-control" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-9">
				<span id="send" class="btn-blue btn center-block pull-right" style="margin-top: 15px;">
					<?php echo lang('BTN_FORGOT');?>
				</span>
			</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function() {
	$('#send').click(function(event) {
		var submit = $( "form#forgotPassword").serializeArray();
		console.log(submit);
		var forgotPassword = $.post('<?php echo $_server?>forgetPassword.do',submit);
		forgotPassword.done(function( data ) {
			if(data.responseCode == 200){
				$( "#text").html('กรุณารอรับรหัสผ่านจาก E-mail');
				$( "#text").removeClass('text-red');
				$( "#forgotPassword").hide();
				setTimeout(function(){ window.location = '<?php echo site_url();?>'; }, 5000);
			}
			else{
				$( "#forgotPassword").show();
				$( "#text").addClass('text-red');
				$( "#text").html('E-mail หรือ Username ไม่ถูกต้อง กรุณากรอกใหม่');
			}
		});
	})
});
</script>