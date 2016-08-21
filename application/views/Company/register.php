<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12">
					<h2><?php echo lang('COMP_REGISTER');?></h2>
					<hr>
				</div>
			</div>
			
			<!-- <form action="<?php echo $_server?>corpRegister.do?" method="POST" id="regis-form" enctype="multipart/form-data"> -->
			<!-- <?php echo site_url();?>auth/setSession -->
			<form method="POST" id="regis-form" enctype="multipart/form-data">
				<input type="hidden" name="lang" value="<?php echo $lang?>">
				<input type="hidden" name="_server" value="<?php echo $_server?>">
				<input type="hidden" name="redirectUrl" value="<?php echo base_url(); ?>redirect">
				<div class="row">
					<div class="col-sm-12">
						<h3><?php echo lang('COMP_INFO');?></h3>
					</div>
					<div class="col-sm-12">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_NAME');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="corpName" id="corpName">
									<div id="corpName-error" class="text-red"></div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_FLG');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<select class="form-control" name="corpTypeId" id="corpTypeId">
										<?php
											foreach ($CorpType as $CorpTypes) {
												echo '<option value="'. $CorpTypes->corpTypeId .'">' . $CorpTypes->name . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right tradeNo">
										<?php echo lang('PERSONAL_ID') ?> : <span class="text-red">*</span>
								</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="tradeNo" id="tradeNo">
								</div>
								<div class="col-sm-1">
									<span class="btn btn-blue" id="check-crop">ตรวจสอบ</span>
								</div>
								<label class="col-sm-3 control-label t-left" id="check-reason">
								</label>
							</div>
							
							<div class="form-group taxNo hidden">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TAX_NO');?> :<span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="taxNo" id="taxNo">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SOCIAL_SEC_NO');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="socialSecNo" id="socialSecNo">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_TYPE');?> :</label>
								<div class="col-sm-5">
									<select class="form-control" id="enterpriseTypeId" name="enterpriseTypeId">
										<?php
											foreach ($EnterpriseType as $EnterpriseTypes) {
												echo '<option value="'. $EnterpriseTypes->corpEnterpriseId .'">' . $EnterpriseTypes->name . '</option>';
											}
										?>										
									</select>
									<div id="corpTypeId-error" class="text-red"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_SUB_TYPE');?> :</label>
								<div class="col-sm-5">
									<select class="form-control" id="enterpriseSubTypeId" name="enterpriseSubTypeId">
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DETAIL');?> :</label>
								<div class="col-sm-5">
									<textarea class="form-control" rows="3" placeholder="" name="detail" id="detail"></textarea>
								</div>
							</div>							

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_BENEFIT');?> :</label>
								<div class="col-sm-5">
									<textarea class="form-control" rows="3" placeholder="" name="benefits" id="benefits"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_REGISTER_BASIS');?> :</label>
								<div class="col-sm-5">
									<input type="file" class="regFormFile" id="regFormFile" name="regFormFile">
								</div>
								<div class="col-sm-9">
									<small>
										<b><?php echo lang('SUGGESTION');?></b> : 
										<?php echo lang('SUGGESTION_FILE');?>
									</small>
								</div>
							</div>
							<hr>
						</div>
					</div>
					
					<div class="col-sm-12">
						<h3>บัญชีผู้ใช้งาน</h3>
					</div>
					
					<div class="col-sm-12">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_USERNAME');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="username" id="username-register">
									<div id="username-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PASSWORD');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" id="password-register">
									<div id="password-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CONFIRM_PASSWORD');?> :</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
									<div id="confirmPassword-error" class="text-red"></div>
								</div>
							</div>
							<hr>
						</div>
					</div>

					<div class="col-sm-12">
						<h3><?php echo lang('COMP_ADDRESS');?></h3>
					</div>
					
					<div class="col-sm-12">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADDRESS');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="address" id="address">
									<div id="address-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PROVINCE');?> :</label>
								<!-- <input type="hidden" name="provinceId" id="provinceId"> -->
								<div class="col-sm-5 s2-radius">
									<select class="form-control select2" name="provinceId" id="provinceId">									
										<?php
											foreach ($Province as $Provinces) {
												echo '<option value="'. $Provinces->provinceId .'">' . $Provinces->name . '</option>';
											}
										?>											
									</select>
									<div id="provinceId-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DISTRICT');?> :</label>
								<!-- <input type="hidden" name="districtId" id="districtId"> -->
								<div class="col-sm-5 s2-radius">
									<select class="form-control select2" name="districtId" id="districtId">
										<option value="-1"><?php echo lang('SELECT_NONE');?></option>
									</select>
									<div id="districtId-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SUB_DISTRICT');?>  :</label>
								<!-- <input type="hidden" name="subDistrictId" id="subDistrictId"> -->
								<div class="col-sm-5 s2-radius">
									<select class="form-control subDistrictId select2" name="subDistrictId" id="subDistrictId">
										<option value="-1"><?php echo lang('SELECT_NONE');?></option>
									</select>
									<div id="subDistrictId-error" class="text-red"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ZIPCODE');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="zipcode" id="zipcode">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="tel" id="tel">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_FAX');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="fax" id="fax">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="email" id="email" data-error="Bruh, that email address is invalid" >
									<div id="email-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CONFIRM_EMAIL');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="confirmEmail" id="confirmEmail" data-error="Bruh, that email address is invalid" >
									<div id="email-error" class="text-red"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_WEBSITE');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="website" id="website">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_LOGO');?> :</label>
								<div class="col-sm-5">
									<input type="file" id="logoFile" class="regFormFile" name="logoFile">
								</div>
								<div class="col-sm-9">
									<small>
										<b><?php echo lang('SUGGESTION');?></b> : 
										<?php echo lang('SUGGESTION_FILE');?>
									</small>
								</div>
							</div>							
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right">แผนที่:</label>
								<div class="col-sm-5">
									<input type="file" class="regFormFile" id="regMapFile" name="mapFile">
								</div>
								<div class="col-sm-9">
									<small>
										<b><?php echo lang('SUGGESTION');?></b> : 
										<?php echo lang('SUGGESTION_FILE');?>
									</small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label text-right">แผนที่:</label>
								<button type="button" class="btn-gray btn GGmap" data-toggle="modal" data-target="#myModal" style="border-radius: 4px;padding: 2px 10px;">
									เลือกแผนที่
								</button>
								<span id="mapLat"></span>
								<span id="mapLong"></span>
							</div>
							<hr>
						</div>
					</div>
					
					<div class="col-sm-12">
						<h3><?php echo lang('COMP_CONTACT_INFO');?></h3>
					</div>
					
					<div class="col-sm-12">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PREFIX');?> :</label>
								<div class="col-sm-5">
									<select class="form-control" name="contactPrefixId">
										<?php
											foreach ($Prefix as $Prefixs) {
												echo '<option value="'. $Prefixs->prefixId .'">' . $Prefixs->name . '</option>';
											}
										?>	
									</select>
									<div id="contactPrefixId-error" class="text-red"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_NAME');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="contactName" id="contactName">
									<div id="contactName-error" class="text-red"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SURNAME');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="contactLastname" id="contactLastname">
									<div id="contactLastname-error" class="text-red"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_POSITION');?> :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="position" id="position">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="contactTel" id="contactTel">
								</div>
							</div>
							<div class="form-group hidden">
								<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> : <span class="text-red">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="contactEmail" id="contactEmail">
								</div>
							</div>
							<hr>
						</div>
					</div>
					
				</div>

				<div class="row" style="padding-bottom: 20px;">
					<div class="col-sm-12">
						<span class="btn-blue btn center-block pull-right submit" style="margin-top: 15px;"><?php echo lang('BTN_REGISTER');?></span>
						<a href="<?php echo base_url('auth/logout');?>">
							<span class="btn-gray btn center-block pull-right" style="margin-top: 15px; margin-right: 15px;"><?php echo lang('BTN_CANCEL');?></span>
						</a>
					</div>
				</div>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel"><?php echo lang('GOOGLE_MAP') ?></h4>
						</div>
						<div class="modal-body">
							<div id="map_canvas" style="height:380px;"></div>
							<div id="showDD" class="form-horizontal" style="margin:auto;padding-top:5px;">  
								<div class="form-group">
									<label class="col-sm-2 control-label"><?php echo lang('BTN_SEARCH') ?> :</label>
									<div class="col-sm-8">
										<input name="namePlace" type="text" class="form-control" id="namePlace"/>
									</div>
									<div class="col-sm-2">
										<span class="btn-blue btn center-block" name="SearchPlace" id="SearchPlace"><?php echo lang('BTN_SEARCH') ?></span>
									</div>
								</div>
								<form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">    
									<div class="form-group">
										<label class="col-sm-2 control-label"><?php echo lang('LAT') ?> :</label>
										<div class="col-sm-8">
											<input name="latitude" class="form-control" type="text" id="latitude" value="0" size="17" />  
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label"><?php echo lang('LONG') ?> :</label>
										<div class="col-sm-8">
											<input name="longitude" class="form-control" type="text" id="longitude" value="0" size="17" />  
										</div>
									</div>
								</form>  
								<div class="form-group text-right">
									<div class="col-sm-12">
										<button type="button" class="btn btn-blue " data-dismiss="modal" aria-label="Close">
											<?php echo lang('BTN_SAVE') ?>
										</button>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
	$(function(){
		$('.regFormFile').filestyle({
			buttonName : 'btn-info  btn'
		});
		$('#check-crop').click(function(event) {
			parameter = {
				corpTypeId : $('#corpTypeId').val(),
				corpName :$('#corpName').val(),
				corpNo: $('#tradeNo').val()
			}
			console.log(parameter);
			var cropcheck = $.post('<?php echo $_server ?>corpUniqueCheck',parameter);
			cropcheck.done(function( data ) {
				if(data.responseCode == 200 ){
					if(data.data.reason != '') reason = data.data.reason;
					else reason = '<span class="text-success"><i class="fa fa-check" aria-hidden="true"></i> สามารถใช้งานได้ </span>';
					$('#check-reason').html(reason);
				}
			});
		});
		
		changeenterpriseSubTypeId('-1');
		$("#enterpriseTypeId").change(function(){
			changeenterpriseSubTypeId();
		});


		if("<?php echo $this->session->userdata('set_update')?>" == 'update'){
			provinceId = '<?php echo $this->session->userdata('set_provinceId')?>';
			districtId = '<?php echo $this->session->userdata('set_districtId')?>';
			subDistrictId = '<?php echo $this->session->userdata('set_subDistrictId')?>';

			contactPrefixId = '<?php echo $this->session->userdata('set_contactPrefixId')?>';
			enterpriseTypeId = '<?php echo $this->session->userdata('set_enterpriseTypeId')?>';
			enterpriseSubTypeId = '<?php echo $this->session->userdata('set_enterpriseSubTypeId')?>';
			corpTypeId = '<?php echo $this->session->userdata('set_corpTypeId')?>';

			$('#provinceId').val(provinceId);
			$('select[name="contactPrefixId"]').val(contactPrefixId);
			$( "#enterpriseTypeId" ).val(enterpriseTypeId);
			$( "#enterpriseTypeId" ).val(enterpriseTypeId);
			$('select[name="corpTypeId"]').val(corpTypeId);
			$( "#corpName" ).val('<?php echo $this->session->userdata('set_corpName')?>');
			$( "#tradeNo" ).val('<?php echo $this->session->userdata('set_tradeNo')?>');
			$( "#taxNo" ).val('<?php echo $this->session->userdata('set_tradeNo')?>');
			$( "#socialSecNo" ).val('<?php echo $this->session->userdata('set_socialSecNo')?>');
			$( "#detail" ).val('<?php echo $this->session->userdata('set_detail')?>');
			$( "#benefits" ).val('<?php echo $this->session->userdata('set_benefits')?>');
			$('#username-register').val('<?php echo $this->session->userdata('set_username')?>');
			$('#password-register').val('<?php echo $this->session->userdata('set_password')?>');
			$('#confirmPassword').val('<?php echo $this->session->userdata('set_confirmPassword')?>');
			$( "#address" ).val('<?php echo $this->session->userdata('set_address')?>');
			$( "#zipcode" ).val('<?php echo $this->session->userdata('set_zipcode')?>');
			$( "#tel" ).val('<?php echo $this->session->userdata('set_tel')?>');
			$( "#fax" ).val('<?php echo $this->session->userdata('set_fax')?>');
			$( "#email" ).val('<?php echo $this->session->userdata('set_email')?>');
			$( "#confirmEmail" ).val('<?php echo $this->session->userdata('set_confirmEmail')?>');
			$( "#website" ).val('<?php echo $this->session->userdata('set_website')?>');
			$( "#contactName" ).val('<?php echo $this->session->userdata('set_contactName')?>');
			$( "#contactLastname" ).val('<?php echo $this->session->userdata('set_contactLastname')?>');
			$( "#position" ).val('<?php echo $this->session->userdata('set_position')?>');
			$( "#contactTel" ).val('<?php echo $this->session->userdata('set_contactTel')?>');
			
			changeCorpTypeId(corpTypeId);
			changedistrictId(districtId,subDistrictId);
			changeenterpriseSubTypeId(enterpriseSubTypeId);
			$('#username-register').focus();
		}

		$("select[name='corpTypeId']").change(function(event) {
			var corpTypeId = $("select[name='corpTypeId']").val();
			changeCorpTypeId(corpTypeId);
		});
		
		$("#SearchPlace").click(function(){
			searchPlace();
		});
		$("#namePlace").keyup(function(event){
			if(event.keyCode==13){
				searchPlace();	
			}		
		});

		// validate
		$("#regis-form").validate({
			rules: {
				corpName: {
					required: true,
					maxlength: 256
				},
				address: {
					required: true,
					maxlength: 1024
				},
				subDistrictId: "required",
				districtId: "required",
				provinceId: "required",
				
				email: {
					required: true,
					email: true,
				},
				confirmEmail:{
					equalTo: "#regis-form #email"
				},
				username: {
					required: true,
					maxlength: 128,
					minlength: 6
				},
				password: {
					required: true,
					maxlength: 128,
					minlength: 8
				},
				confirmPassword: {
					equalTo: "#regis-form #password-register",
				},
				contactPrefixId: "required",
				corpTypeId: "required",
				contactName: {
					required: true,
					maxlength: 256 
				},
				contactLastname: {
					required: true,
					maxlength: 256 
				},
				contactTel: {
					required: true,
					maxlength: 50,
					number: true
				},
				contactEmail:{
					required: true,
					email: true
				},
				tradeNo: {
					required: true,
					maxlength: 50,
					minlength: 13,
				},
				socialSecNo: {
					maxlength: 50,
				},
				tel: {
					maxlength: 50,
				},
				fax: {
					maxlength: 50,
				},
				position: {
					maxlength: 512,
				}
			},
			messages: {
				confirmPassword: "<?php echo lang('VALIDATE_CONFIRM_PASSWORD') ?>",
			}
		});
		$(".submit").click(function(event) {
			var data = $( "form#regis-form").serializeArray();
			var setSession = $.post('<?php echo site_url(); ?>auth/setSession',data);
			setSession.done(function( data ) {
				console.log(data);
			});
			$('#regis-form').attr('action', "<?php echo $_server?>corpRegister.do?").submit();
		});
		$("#SearchPlace").click(function(){
			searchPlace();
		});
		$("#namePlace").keyup(function(event){
			if(event.keyCode==13){
				searchPlace();	
			}		
		});

		$("select[name='provinceId']").change(function(event) {
			paramChange ={
				provinceId :$("#provinceId").val(),
				districtId :'-1',
				subDistrictId :'-1',
				_server : '<?php echo $_server?>',
			}
			changedistrictIds(paramChange);
		});
		$("select[name='districtId']").change(function(event) {
			paramChange ={
				provinceId :$("#provinceId").val(),
				districtId :$("#districtId").val(),
				subDistrictId :'-1',
				_server : '<?php echo $_server?>',
			}
			changesubDistrictIds(paramChange);
		});


		$(".GGmap").click(function(event) {
			$("<script/>", {
			  "type": "text/javascript",
			  src: "http://maps.googleapis.com/maps/api/js?v=3&sensor=false&callback=initialize"
			}).appendTo("body");
			google.maps.event.addDomListener(window, 'load', initialize(latitude,longitude));	
		});
	});

	var geocoder;
	var map;
	var my_Marker;
	var GGM;
	function changeenterpriseSubTypeId(enterpriseSubTypeId) {
		var enterpriseTypeId = $("#enterpriseTypeId").val();
		$.ajax({
		  	url: "<?php echo $_server?>getBusinessType.do?corpEnterpriseId="+enterpriseTypeId,
		  	success: function( data ) {
		  		$("#enterpriseSubTypeId option").remove();
		  		for (var i = 0; i <  data.length; i++) {
		  			$('#enterpriseSubTypeId').append($('<option>', { 
				        value: data[i].corpBusinessId,
				        text : data[i].name 
			    	}));
		  		}
		  		if(enterpriseSubTypeId){
		  			$( "#enterpriseSubTypeId" ).val(enterpriseSubTypeId);
		  		}
		  	}
		});	
	}

	function changeCorpTypeId(corpTypeId){
		if(corpTypeId == 1){
			$('.tradeNo').html('<?php echo lang('PERSONAL_ID') ?> : <span class="text-red">*</span>');
			$('.taxNo').hide();
		}
		else{
			$('.tradeNo').html('<?php echo lang('FORM_TRADE_NO') ?> : <span class="text-red">*</span>');
			$('.taxNo').show();
		}
	}

	function initialize(lat,long) {
		if(lat || $('#latitude').val() != 0){
			lat = (lat)? lat : $('#latitude').val();
		}
		else{
			lat = 13.7563309;
		}
		if(long || $('#longitude').val() != 0){
			long = (long)? lat : $('#longitude').val();
		}
		else{
			long = 100.50176510000006;
		}
		
		GGM=new Object(google.maps);
		geocoder = new GGM.Geocoder();
		var my_Latlng  = new GGM.LatLng(lat,long);
		var my_mapTypeId=GGM.MapTypeId.ROADMAP;
		var my_DivObj=$("#map_canvas")[0];
		var myOptions = {
			zoom: 15,
			center: my_Latlng ,
			mapTypeId:my_mapTypeId
		};
		map = new GGM.Map(my_DivObj,myOptions);
		my_Marker = new GGM.Marker({
			position: my_Latlng,
			map: map,
			draggable:true,
		});
		GGM.event.addListener(my_Marker, 'dragend', function() {
			var my_Point = my_Marker.getPosition();
	        map.panTo(my_Point);
	        $("#latitude").val(my_Point.lat());
	        $("#longitude").val(my_Point.lng());
	       
	        $("#mapLat").html('( '+my_Point.lat()+' , ');
	        $("#mapLong").html(my_Point.lng()+' )');
		});		

		GGM.event.addListener(map, 'zoom_changed', function() {
			$("#zoom_value").val(map.getZoom());	
		});
	}

	function searchPlace(){
		var AddressSearch=$("#namePlace").val();
		if(geocoder){
			geocoder.geocode({
				 address: AddressSearch
			},function(results, status){
	  			if(status == GGM.GeocoderStatus.OK) {
					var my_Point=results[0].geometry.location;
					map.setCenter(my_Point);
					my_Marker.setMap(map);	
					my_Marker.setPosition(my_Point);
					$("#latitude").val(my_Point.lat());
					console.log(my_Point.lng());
					$("#longitude").val(my_Point.lng());					
				}else{
					alert("Geocode was not successful for the following reason: " + status);
					$("#namePlace").val("");
				 }
			});
		}		
	}
</script>
