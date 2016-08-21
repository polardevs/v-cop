<div class="banner-top">
	<div class="container">
		<div class="row">
			<a href="<?php echo site_url();?>">
				<div class="col-sm-6" style="padding-top: 5px;">
					<img style="display: inline-block;" src="<?php echo site_url();?>assets/common/images/logo_vcop.png" class="img-responsive img-header" />
				</div>
			</a>
			<div class="col-sm-6 line-right hidden-xs" style="padding-top: 5px;">
				<ul class="nav navbar-nav navbar-right">
					<?php
						if (isset($userdata['name']) ) {
					?>
						<li class="dropdown">
							<span href="" class="dropdown-toggle btn btn-warning" data-toggle="dropdown"><?=$userdata['name']?> <?=$userdata['lastname']?><span class="caret"></span></span>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url().$userdata['res_url']?>"><?php echo lang('MAIN_MENU_PROFILE');?></a></li>
									<li><a href="<?php echo site_url();?>auth/logout"><?php echo lang('MAIN_MENU_LOGOUT');?></a></li>
								</ul>
						</li>
					<?php
						}else{
					?>
						<li>
							<a class="register" href="<?php echo site_url();?>register">
								<span class="dropdown-toggle btn btn-success">
									<?php echo lang('MAIN_MENU_REGISTER');?>
								</span>
							</a>
						</li>
						<?php
						 if($this->uri->segment(1)!='update' ){

						?>
							<li class="dropdown">
								<span href="" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">
									<?php echo lang('MAIN_MENU_LOGIN');?> 
									<span class="caret"></span>
								</span>
								<ul class="dropdown-menu" role="menu">
									<li>
										<form id="home-login" class="navbar-form navbar-left validate-form" method="post" role="form" style="width: 350px;" novalidate="novalidate">
											<div class="onlogin">
												<input type="hidden" name="lang" value="th" id="lang">
				      
												<div class="form-group">
													<div class="col-sm-12 controls">											
														<label for="username" class="control-label"><h3><?php echo lang('MAIN_MENU_LOGIN');?></h3></label>
														<input type="text" class="form-control login" id="username" name="username" placeholder="Username" data-rule-required="true" style="width: 290px">
													</div>
												</div>
												<div class="clearfix"></div><br>
												<div class="form-group">
													<div class="col-sm-6 controls">											
														<input type="password" class="form-control login" id="password" name="password" placeholder="Password" data-rule-required="true" style="width: 290px">
													</div>
												</div>
												<div class="clearfix"></div><br>
		  									
												<div class="col-sm-12 text-center">
													<div id="tu-direct-login-error" class="text-red"></div>
												</div>
												<div class="col-sm-6 controls">
													<a href="<?php echo site_url();?>forgot">ลืมรหัสผ่าน</a>
												</div>
												<div class="col-sm-12 controls hidden">
													<a href="http://vec.dealzep.com:8080/vcop/">
														สถานศึกษาเข้าสู่ระบบ
													</a>
												</div>
												<div class="col-sm-6 controls hidden">
													<input type="checkbox"/>จำฉันไว้ในระบบ
												</div>
												<div class="clearfix"></div><br>
												<div class="col-sm-12">
													<button type="submit" class="btn btn-block btn-warning tu-direct-login"><?php echo lang('MAIN_MENU_LOGIN');?></button>
												</div>			  	
											  	<div class="clearfix"></div><br>
											  	<div class="col-sm-12 text-center hidden">
													<small><a href="<?php echo site_url();?>register"><?php echo lang('MAIN_MENU_REGISTER');?></a></small>
												</div>	
											</div>						  	
										</form>
										
									</li>
								</ul>
							</li>
					<?php
						}
					}
					?>
					<!-- <li class="dropdown" style="padding-top: 15px;">
						<span href="" class="dropdown-toggle text-uppercase " data-toggle="dropdown">| 
							<?php echo $lang;?> <span class="caret"></span>
						</span>
						<ul class="dropdown-menu lang" role="menu">
							<li><a class="text-uppercase changeLang">TH</a></li> 
							<li><a class="text-uppercase changeLang">EN</a></li>
						</ul>
					</li>-->
				</ul>
			</div>
		</div>
	</div>
</div>

<?php  
	if($this->uri->segment(1)!='update' ){
		$this->load->view('navbar');
	}
?>
<script>
	$(function(){
		var auth = function( method ,mobile) {
			var server = "<?php echo $_server?>"+"authen.do";		
			var submit = $( "form#home-" +mobile+ method ).serializeArray();
			var callApi = true;
			
			if(callApi === true){
				var api = $.post( server , submit);
				api.done(function( data ) {
					// console.log(data);
					if(data.responseCode >= "400" && data.data.userId == undefined){
						UnLoadingPage();
						var msg = data.responseMessage + "(" + data.data + ")";
						$("#tu-direct-"+method+"-error").text(msg);
					}else if (data.responseCode == '200'){
						// if(data.data.userType.userTypeId == 4){
						// 	$("#tu-direct-"+method+"-error").text('มีบางอย่างผิดพลาด Username หรือ รหัสผ่านของคุณอาจไม่ถูกต้อง');
						// 	UnLoadingPage();
						// 	return false;
						// }
						// else 
						if(data.data.userType.userTypeId != 4 && data.data.userType.userTypeId != 3){
							loginUsername = submit[1].value;
							loginPassword = submit[2].value;
							var url = "<?php echo $_server?>"+"../authen.do";		
							window.location.href  = url+'?username='+loginUsername+'&password='+loginPassword;
							
						}
						var setsession = $.post("<?php echo site_url(); ?>auth/"+method, data );
						setsession.done(function( session ){
							var sessions = $.parseJSON(session);
							console.log(sessions);
							window.location.href = sessions.res_url;
						});
					}else{
						UnLoadingPage();
						$("#tu-direct-"+method+"-error").text(data.responseMessage);
					}
				 });
			}
			 return false;
		};

		$("form#home-login").submit(function(){
			LoadingPage();
			if($('#username').val() && $('#password').val()){
				auth('login',''); return false;
			}else{
				UnLoadingPage();
			}
		});
		$("form#home-mobile-login").submit(function(){
			LoadingPage();
			if($('#username-mobile').val() && $('#password-mobile').val()){
				auth('login','mobile-'); return false;
			}else{
				UnLoadingPage();
			}
		});

		$(".changeLang").click(function(){
			$lang = $(this).html().toLowerCase();
			var url =window.location.href;
			var data = {lang: $lang };
			var setlang = $.post("<?php echo site_url(); ?>auth/changeLang", data );
			
			setlang.done(function( data ) {
				location.reload();
			});
		});
	});
</script>