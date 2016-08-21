<div class="container body-company">
	<div class="row">
		<div class="col-sm-2">
			<?php  $this->load->view('navbar-company');?>
		</div>
		<div class="col-sm-10">
		<form id="Profile-form" action="<?php echo $_server?>editCorpProf.do?" method="POST" id="editCorpProf-form" enctype="multipart/form-data">
			<input type="hidden" name="lang" value="<?=$lang?>">
			<input type="hidden" name="redirectUrl" value="<?php echo base_url(); ?>profile-company">
			<input type="hidden" name="token" value="<?php echo base64_encode($userdata['user_id']);?>">
			<div class="row">
				<div class="col-sm-12">
					<h2><?php echo lang('COMP_COMPANY_INFO');?></h2>
					<hr>
				</div>
				<div class="col-sm-12">
					<img id="logoFilePath" class="center-block img-responsive" style="max-height: 100px;" src="">
				</div>
				<div class="col-sm-12 hidden">
					<h3><?php echo lang('COMP_USER_INFO'); ?></h3>
				</div>
				
				<div class="col-sm-12 hidden">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_USERNAME');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PASSWORD');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				
				<div class="col-sm-12">
					<h3><?php echo lang('COMP_INFO');?></h3>
				</div>
				
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_NAME');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="name"></div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_LOGO');?> :
							</label>
							<div class="col-sm-6">
								<input type="file" id="logoFile" name="logoFile">
							</div>
							<div class="col-sm-8 col-sm-offset-3">
								<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_LOGO');?></small>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TRADE_NO');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="tradeNo"></div>
						</div>
						
						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TAX_NO');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="taxNo"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SOCIAL_SEC_NO');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="socialSecNo"></div>
						</div>
						
						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_FLG');?> :</label>
							<div class="col-sm-6">
								<select class="form-control" name="corpTypeId">
									<?php
										foreach ($CorpType as $CorpTypes) {
											echo '<option value="'. $CorpTypes->corpTypeId .'">' . $CorpTypes->name . '</option>';
										}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_TYPE');?> :</label>
							<div class="col-sm-6">
								<select class="form-control" id="enterpriseTypeId" name="enterpriseTypeId">
									<?php
										foreach ($EnterpriseType as $EnterpriseTypes) {
											echo '<option value="'. $EnterpriseTypes->corpEnterpriseId .'">' . $EnterpriseTypes->name . '</option>';
										}
									?>										
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_CROP_SUB_TYPE');?> :</label>
							<div class="col-sm-6">
								<select class="form-control" id="enterpriseSubTypeId" name="enterpriseSubTypeId">
									<?php
										foreach ($BusinessType as $BusinessTypes) {
											echo '<option value="'. $BusinessTypes->corpBusinessId .'">' . $BusinessTypes->name . '</option>';
										}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DETAIL');?> :</label>
							<div class="col-sm-6"><textarea class="form-control" rows="3" name="detail"></textarea></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_BENEFIT');?> :</label>
							<div class="col-sm-6">
								<textarea class="form-control" rows="3" name="benefits"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right">
								<?php echo lang('FORM_REGISTER_BASIS');?> :
							</label>
							<div class="col-sm-6">
								<input type="file" id="regFormFile" name="regFormFile">
							</div>
							<div class="col-sm-8">
								<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_FILE');?></small>
							</div>
							<div class="col-sm-6 col-sm-offset-3">
								<div class="appFilePath"></div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="col-sm-12">
					<h3><?php echo lang('COMP_ADDRESS');?></h3>
				</div>
				
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ADDRESS');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="address"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_PROVINCE');?> :</label>
							<div class="col-sm-6 s2-radius provinceId">
								<select class="form-control select2" name="provinceId" id="provinceId">
									<?php
										foreach ($Province as $Provinces) {
											echo '<option value="'. $Provinces->provinceId .'">' . $Provinces->name . '</option>';
										}
									?>											
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_DISTRICT');?> :</label>
							<div class="col-sm-6 s2-radius districtId">
								<select class="form-control select2" name="districtId" id="districtId">
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_SUB_DISTRICT');?> :</label>
							<div class="col-sm-6 s2-radius">
								<select class="form-control select2" name="subDistrictId" id="subDistrictId">
									<option value="-1"><?php echo lang('SELECT_NONE');?></option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_ZIPCODE');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="zipcode"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="tel"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_FAX');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="fax"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_EMAIL');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="email"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_WEBSITE');?> :</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="website" placeholder="ตัวอย่าง http://v-cop.com">
							</div>
						</div>
						
						<div class="form-group hidden">
							<label class="col-sm-3 control-label text-right"><?php echo lang('CORP_IMAGE') ?> :</label>
							<div class="col-sm-6"><input type="file" style="font-size: 15px; padding-top: 7px;"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_MAP');?> :</label>
							<div class="col-sm-6">
								<input type="file" id="mapFile" name="mapFile">
							</div>
							<div class="col-sm-8 col-sm-offset-3">
								<small><b><?php echo lang('SUGGESTION');?></b> : <?php echo lang('SUGGESTION_LOGO');?></small>
							</div>
							<div class="col-sm-6 col-sm-offset-3 mapFilePath" style="display:none;"></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_MAP') ?>:</label>
							<button type="button" class="btn-gray btn GGmap" data-toggle="modal" data-target="#myModal" style="border-radius: 4px;padding: 2px 10px;">
								<?php echo lang('SELECT_MAP') ?>
							</button>
							<span id="mapLat"></span>
							<span id="mapLong"></span>
						</div>
					</div>
				</div>
				
				<div class="col-sm-12">
					<h3><?php echo lang('COMP_CONTACT_INFO');?></h3>
				</div>
				
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_NAME');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="contact"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_POSITION');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="contactPosition"></div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('FORM_TEL');?> :</label>
							<div class="col-sm-6"><input type="text" class="form-control" name="contactTel"></div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-12">
					<h3><?php echo lang('COMP_RECRUIT');?></h3>
				</div>
				
				<div class="col-sm-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label text-right"><?php echo lang('COMP_PLOY_RECRUIT');?> :</label>
							<div class="col-sm-6">
								<div class="checkbox inline-block">
								    <label>
								      	<input type="checkbox" id="allowRegWalkin" name="allowRegWalkin" value="y"> 
								      	<?php echo lang('ALLOWREGWALKIN'); ?>
								    </label>
						  		</div>
						  		<div class="checkbox inline-block">
								    <label>
								      	<input type="checkbox" id="allowRegOnline" name="allowRegOnline" value="y">
								      	<?php echo lang('ALLOWREGONLINE'); ?>
								    </label>
						  		</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<div class="row" style="padding-bottom: 20px;">
				<div class="col-sm-12">
					<button type="submit" class="btn-blue btn center-block pull-right" style="margin-top: 15px;" id="save">
						<?php echo lang('BTN_SAVE');?>
					</button>
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
										<div class="col-sm-4">
											<input name="latitude" class="form-control" type="text" id="latitude" value="0" size="17" />  
										</div>
										<label class="col-sm-2 control-label"><?php echo lang('LONG') ?> :</label>
										<div class="col-sm-4">
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
$( document ).ready(function() {
	LoadingPage();
	$("#provinceId").change(function(){
		paramChange ={
			provinceId :$("#provinceId").val(),
			districtId :$("#districtId").val(),
			subDistrictId :$("#subDistrictId").val(),
			_server : '<?php echo $_server ?>',
			ONLOAD : '<?php echo lang('ONLOAD') ?>',
			SELECT_NONE :'<?php echo lang('SELECT_NONE');?>'
		}
		changedistrictIds(paramChange,'main','Change');
	});

	$(".provinceId").click(function(event) {
		$("select[name='provinceId']").change(function(event) {
			paramChange ={
				provinceId :$("#provinceId").val(),
				districtId :'-1',
				subDistrictId :'-1',
				_server : '<?php echo $_server?>',
			}
			changedistrictIds(paramChange);
		});
	});
	$(".districtId").click(function(event) {
		$("select[name='districtId']").change(function(event) {
			paramChange ={
				provinceId :$("#provinceId").val(),
				districtId :$("#districtId").val(),
				subDistrictId :'-1',
				_server : '<?php echo $_server?>',
			}
			changesubDistrictIds(paramChange);
		});
	});
	
	$("#enterpriseTypeId").change(function(){
		changeenterpriseSubTypeId();
	});

	$('#mapFile').filestyle({
		buttonName : 'btn-info  btn'
	});
	$('#logoFile').filestyle({
		buttonName : 'btn-info  btn'
	});
	$('#regFormFile').filestyle({
		buttonName : 'btn-info  btn'
	});
	

	var api = $.post( '<?php echo $_server?>getCorpDetail.do?corpId=<?php echo $_corpId; ?>');
	api.done(function( data ) {
		CorpDetail = data.data;
		console.log(CorpDetail);
		$( "textarea[name ='benefits']" ).val( CorpDetail.benefits);
		$( "textarea[name ='detail']" ).val( CorpDetail.detail);
		$( "input[name ='zipCode']" ).val( CorpDetail.zipCode);
		$( "input[name ='contactTel']" ).val( CorpDetail.contactTel);
		$( "input[name ='contact']" ).val( CorpDetail.contact);
		$( "input[name ='contactPosition']" ).val( CorpDetail.contactPosition);
		$( "input[name ='zipcode']" ).val( CorpDetail.zipCode);
		$( "input[name ='tel']" ).val( CorpDetail.tel);
		$( "input[name ='fax']" ).val( CorpDetail.fax);
		$( "input[name ='taxNo']" ).val( CorpDetail.taxNo);
		$( "input[name ='email']" ).val( CorpDetail.email);
		$( "input[name ='website']" ).val( CorpDetail.website);
		$( "input[name ='address']" ).val( CorpDetail.address);
		$( "input[name ='tradeNo']" ).val( CorpDetail.tradeNo);
		$( "input[name ='socialSecNo']" ).val( CorpDetail.socialSecNo);
		$( "input[name ='name']" ).val( CorpDetail.name);
		$( "input[name ='latitude']" ).val( CorpDetail.lattitude);
		$( "input[name ='longitude']" ).val( CorpDetail.longitude);
		$('#logoFilePath').attr("src", CorpDetail.logoFilePath)
		if(CorpDetail.allowRegOnline=='y'){
			$( "input[name ='allowRegOnline']" ).attr('checked', 'checked');
		}
		if(CorpDetail.allowRegWalkin=='y'){
			$( "input[name ='allowRegWalkin']" ).attr('checked', 'checked');
		}
		$( "#enterpriseTypeId" ).val( CorpDetail.enterpriseTypeId);
		changeenterpriseSubTypeId(CorpDetail.enterpriseTypeId , CorpDetail.enterpriseSubTypeId);
		
		if(CorpDetail.mapFilePath){
			mapFilePath = '<a href="'+CorpDetail.mapFilePath+'" target="_blank" >'+
							'<img src="'+CorpDetail.mapFilePath+'" class="img-preview">'+
						'</a>'

			$( ".mapFilePath" ).html(mapFilePath).show();
		}
		if(CorpDetail.appFilePath){
			var type = CorpDetail.appFilePath.substring((CorpDetail.appFilePath.length-4), CorpDetail.appFilePath.length);
			if(type== '.pdf'){
				preview = '<?php echo lang('DOWNLOAD').' '.lang('FORM_REGISTER_BASIS');?>';
			}
			else{
				preview = '<img src="'+CorpDetail.appFilePath+'" class="img-preview">';
			}
			appFilePath = '<a href="'+CorpDetail.appFilePath+'" target="_blank" >'+
							preview+
						'</a>'
			$( ".appFilePath" ).html(appFilePath).show();
		}

		$( "#provinceId" ).select2("val", CorpDetail.provinceId);
		paramChange ={
			provinceId : CorpDetail.provinceId,
			districtId : CorpDetail.districtId,
			subDistrictId : CorpDetail.subDistrictId,
			_server : '<?php echo $_server ?>',
			ONLOAD : '<?php echo lang('ONLOAD') ?>',
			SELECT_NONE :'<?php echo lang('SELECT_NONE');?>',
		}
		changedistrictIds(paramChange);
		UnLoadingPage();

	});

	$("#SearchPlace").click(function(){
		searchPlace();
	});
	$("#namePlace").keyup(function(event){
		if(event.keyCode==13){
			searchPlace();	
		}		
	});
	$(".GGmap").click(function(event) {
		$("<script/>", {
		  "type": "text/javascript",
		  src: "http://maps.googleapis.com/maps/api/js?v=3&sensor=false&callback=initialize"
		}).appendTo("body");
		google.maps.event.addDomListener(window, 'load', initialize(13.7597714,100.56564479999997));	
	});

});

function changeenterpriseSubTypeId(enterpriseTypeId,enterpriseSubTypeId) {
	var enterpriseTypeId = (enterpriseTypeId)? enterpriseTypeId : ($("#enterpriseTypeId").val());
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
	    	if (enterpriseSubTypeId){
				$( "#enterpriseSubTypeId" ).val(enterpriseSubTypeId);
			}
	  	}
	});
	
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