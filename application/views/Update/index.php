<div class="container">
	<form id="home-login" class="col-sm-6 col-sm-offset-3" method="post" role="form" novalidate="novalidate" style="padding-bottom: 20px;">
		<input type="hidden" name="lang" value="th" id="lang">
		<div class="form-group">
			<div class="col-sm-12 controls">											
				<label for="username" class="control-label"><h3><?php echo lang('MAIN_MENU_LOGIN');?></h3></label>
				<input type="text" class="form-control login" id="username" name="username" placeholder="Username" data-rule-required="true">
			</div>
		</div>
		<div class="clearfix"></div><br>
		<div class="form-group">
			<div class="col-sm-12 controls">											
				<input type="password" class="form-control login" id="password" name="password" placeholder="Password" data-rule-required="true">
			</div>
		</div>
		<div class="clearfix"></div><br>
			
		<div class="col-sm-12 text-center">
			<div id="tu-direct-login-error" class="text-red"></div>
		</div>
		<div class="col-sm-6 controls">
			<a href="<?php echo site_url();?>forgot">ลืมรหัสผ่าน</a>
		</div>
		<div class="col-sm-6 controls hidden">
			<input type="checkbox"/>จำฉันไว้ในระบบ
		</div>
		<div class="clearfix"></div><br>
		<div class="col-sm-6">
			<button type="submit" class="btn btn-block btn-warning tu-direct-login margin-b-15"><?php echo lang('MAIN_MENU_LOGIN');?></button>
		</div>
		<div class="col-sm-6">
			<span class="btn btn-success btn-block back-home margin-b-15"> เข้าสู่หน้าหลัก</span>
		</div>
		
	</form>
</div>

<script>
	$(document).ready(function() {
		$("form#home-login").submit(function(){
			if($('#username').val() && $('#password').val()){
				auth('login'); return false;
			}
		});
		$(".back-home").click(function(){
			window.location = '<?php echo site_url();?>';
		});
	});

	function auth( method ) {
		var server = "<?php echo $_server?>"+"authen.do";
		var submit = $( "form#home-" + method ).serializeArray();
		var callApi = true;
		
		if(callApi === true){
			var api = $.post( server , submit);
			api.done(function( data ) {
				data.data.update='update';
				console.log(data);
				if(data.responseCode >= "400" && data.data.userId == undefined){
					var msg = data.responseMessage + "(" + data.data + ")";
					$("#tu-direct-"+method+"-error").text(msg);

				}else if (data.responseCode == '200'){
					var setsession = $.post("<?php echo site_url(); ?>auth/"+method, data );
					setsession.done(function( session ){
						var sessions = $.parseJSON(session);
						console.log(sessions);
						window.location.href = sessions.res_url;
					});
				}else{
					$("#tu-direct-"+method+"-error").text(data.responseMessage);
				}
			 });
		}
		 return false;
	}
</script>