<?php 
function CheckUrl($url) {
    if (strpos($url, 'http://') === false) {
    	echo 'http://'.$url;
	}
}

if($this->input->post('appId')){ 
	?>
	<div class="container">
		<div class="chat-box">
			<i class="fa fa-comments" aria-hidden="true"></i> สอบถามเพิ่มเติม
		</div>
	</div>
	<div class="chat-box-massage container" style="display: none;">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-blue">
					<div class="panel-heading">
						<i class="fa fa-comments" aria-hidden="true"></i> สอบถามเพิ่มเติม
						<span class="pull-right chat-box-minus">
							<i class="fa fa-minus-circle" aria-hidden="true"></i>
						</span>
					</div>
					<div class="panel-body chat-box-chats"></div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-9 chat-box-input" style="">
								<input type="text" class="form-control" id="message" placeholder="พิมพ์คำถามที่นี่">
							</div>
							<div class="col-xs-3 chat-box-btn">
								<input id="appId" type="hidden" value="<?php echo $this->input->post('appId');?>">
								<input id="userId" type="hidden" value="<?php echo $this->input->post('userId');?>">
								<span class="btn btn-vec-blue btn-block" id="sendMessage">ส่ง</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

$jobId = ($this->input->post('jobId'))? $this->input->post('jobId') : $this->input->get('jobId');

?>
<div class="container-body">
	<?php
	if(isset($CorpDetail) && isset($JobDetail) && $CorpDetail->responseCode == 200 && $JobDetail->responseCode ==200){
		$CorpDetails = $CorpDetail->data;
		$JobDetails = $JobDetail->data; 
	?>
		<div class="container body-jobdetail hidden-print">
			<div class="row">
				<div class="col-md-12 margin-t-15 text-center">
					<img src="<?php echo $CorpDetails->logoFilePath;?>"  height="200px" alt="">
					<h3><?php echo $JobDetails->position ;?></h3>
					<b class="text-gray"><?php echo $CorpDetails->name;?></b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<?php echo $CorpDetails->detail;?>
				</div>
				<div class="col-md-12 text-gray text-center">
					<i class="fa fa-map-marker" aria-hidden="true"></i> <i><?php echo $JobDetails->provinceName ;?></i>
				</div>
			</div>
			<div class="underline"></div>
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo lang('FORM_ADD_POSITION_COUNT');?> :
					</label>
					<div class="col-md-1 form-control-static">
						<?php echo $JobDetails->positionCount ;?>
					</div>
					<label class="col-md-3 control-label">
						<?php echo lang('COMP_RECRUIT');?> :
					</label>
					<div class="col-md-5 form-control-static">
						<?php 
							$Reg =($JobDetails->allowRegOnline =='y')? lang('JOB_ALLOWREGWALKIN').",":"";
							$Reg .=($JobDetails->allowRegWalkin =='y')? lang('JOB_ALLOWREGONLINE').",":"";
							echo  substr($Reg,0,(strlen($Reg)-1) ) ;
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo lang('FORM_ADD_POSITION_TYPE');?> :
					</label>
					<div class="col-md-2 form-control-static">
						<?php echo $JobDetails->jobTypeName ;?>
					</div>
					<label class="col-md-2 control-label">
						<?php echo lang('FORM_ADD_POSITION_SALARY');?> :
					</label>
					<div class="col-md-5 form-control-static">
						<?php echo $JobDetails->salary ;?>
					</div>
				</div>

				<div class="form-group">	
					<label class="col-md-3 control-label">
						<?php echo lang('FORM_ADD_POSITION_DESCRIPTION');?> :
					</label>
					<div class="col-md-9 form-control-static">
						<?php echo $JobDetails->detail ;?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo lang('FORM_BENEFIT');?> :
					</label>
					<div class="col-md-9 form-control-static">
						<?php echo $CorpDetails->benefits ?><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						<?php echo lang('ADD_POSITION_QUALIFICATION');?> :
					</label>
					<div class="col-md-9 form-control-static">
						<?php echo $JobDetails->qualification ;?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12 form-control-static text-center">
						<b class="text-gray"> <?php echo $CorpDetails->name; ?> </b><br>
						<span>
							<?php 
								echo ($CorpDetails->tel)? "tel : ". $CorpDetails->tel : "" ; 
								echo ($CorpDetails->fax)? " fax : ". $CorpDetails->fax : "" ; 
							?>
						</span><br>
						<span>
							<?php echo ($CorpDetails->email)? "email : ". $CorpDetails->email : "";?>
						</span><br>
						<a href="<?php echo CheckUrl($CorpDetails->website) ;?>">
							<?php echo $CorpDetails->website ;?>
						</a>
						
					</div>
				</div>
				<?php if($CorpDetails->mapFilePath){?>
					<div class="col-md-12 text-center">
						<a href="<?php echo $CorpDetails->mapFilePath ;?>">
							<img src="<?php echo $CorpDetails->mapFilePath ;?>" class="img-preview ">
						</a>
					</div>
				<?php 
				} 
				if($CorpDetails->longitude && $CorpDetails->lattitude){?>
					<div class="col-md-10 col-md-offset-1 text-center" style="padding-top: 30px;">
						<div id="googleMap" style="width:100%;height:380px;"></div>
					</div>
				<?php } ?>
				<?php
					$role =  (isset($userdata['user_role_id']))? $userdata['user_role_id'] : '';
					$hidden = ($role == 3)? "" : "hidden";
					$user_id = (isset($userdata['user_id']))?  $userdata['user_id'] : '';
				?>
				<div class="col-md-10 col-md-offset-1">
					<hr>
					<div class="pull-right print">
						<span class="label label-default <?php echo $hidden;?>" onclick="application('<?php echo $jobId;?>')">
							<i class="fa fa-envelope"></i> สมัครงาน
						</span>
						<span class="label label-default Fav <?php echo $hidden;?>" onclick="Favorites('<?php echo $jobId;?>','<?php echo $_server?>','<?php echo $lang;?>','<?php echo $user_id;?>')">
							<i class="fa fa-star"></i> บันทึกเข้าแฟ้ม
						</span>
						<span class="label label-info" onclick="Print()">
							<i class="fa fa-print"></i>
						</span>			
					</div>
				</div>
			</div>
		</div>
		<div class="container body-jobdetail visible-print" style="font-size: 18px;">
			<div class="row">
				<div class="col-xs-12 margin-t-15">
					<img src="<?php echo $CorpDetails->logoFilePath;?>"  height="200px" alt="">
					<h2><?php echo $JobDetails->position ;?></h2>
					<b class="text-gray"><?php echo $CorpDetails->name;?></b>
				</div>
				<div class="col-xs-12">
					<?php echo $CorpDetails->detail;?>
				</div>
				<div class="col-xs-12 text-gray">
					<i class="fa fa-map-marker" aria-hidden="true"></i> <i><?php echo $JobDetails->provinceName ;?></i>
				</div>
				<label class="col-xs-5 form-control-static">
					<?php echo lang('FORM_ADD_POSITION_COUNT');?> :
				</label>
				<div class="col-xs-7 form-control-static pull-right">
					<?php echo $JobDetails->positionCount ;?>
				</div>

				<label class="col-xs-5 form-control-static">
					<?php echo lang('COMP_RECRUIT');?> :
				</label>
				<div class="col-xs-7 form-control-static">
					<?php 
						$Reg = ($JobDetails->allowRegOnline =='y')? "allowRegOnline , ":"" ;
						$Reg .= ($JobDetails->allowRegWalkin =='y')? "allowRegWalkin  , ":"" ;
						echo  substr($Reg,0,(strlen($Reg)-3) ) ;
					?>
				</div>

				<label class="col-xs-5 form-control-static">
					<?php echo lang('FORM_ADD_POSITION_TYPE');?> :
				</label>
				<div class="col-xs-7 form-control-static">
					<?php echo $JobDetails->jobTypeName ;?>
				</div>
				<label class="col-xs-5 form-control-static">
					<?php echo lang('FORM_ADD_POSITION_SALARY');?> :
				</label>
				<div class="col-xs-7 form-control-static">
					<?php echo $JobDetails->salary ;?>
				</div>
				<label class="col-xs-5 control-label">
					<?php echo lang('FORM_ADD_POSITION_DESCRIPTION');?> :
				</label>
				<div class="col-xs-7 form-control-static">
					<?php echo $JobDetails->detail ;?>
				</div>
				<label class="col-xs-3 control-label">
					<?php echo lang('FORM_BENEFIT');?> :
				</label>
				<div class="col-xs-9 form-control-static">
					<?php echo substr(str_replace('-', '<br>-', $CorpDetails->benefits),4)   ;?>
				</div>
			</div>
			<div class="row form-horizontal">
				<div class="form-group">

					<label class="col-xs-3 control-label">
						<?php echo lang('ADD_POSITION_QUALIFICATION');?> :
					</label>
					<div class="col-xs-9 form-control-static">
						<?php echo $JobDetails->qualification ."<br>". $JobDetails->subjectIds ;?>
					</div>

					<div class="col-xs-10 form-control-static text-center">
						<b class="text-gray visible-xs-block"> <?php echo $CorpDetails->name; ?> </b>
						<span class="visible-xs-block">
							<?php 
								echo ($CorpDetails->tel)? "tel : ". $CorpDetails->tel : "" ; 
								echo ($CorpDetails->fax)? " fax : ". $CorpDetails->fax : "" ; 
							?>
						</span>
						<span class="visible-xs-block">
							<?php echo ($CorpDetails->email)? "email : ". $CorpDetails->email : "";?>
						</span>
						<span class="visible-xs-block"><?php echo $CorpDetails->website ;?></span>
					</div>
				</div>
			</div>
		</div>
	<?php 
	} 
	?>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN0j0Q86ZzGsRZJNwLpgUsrpH9eeiDfco&callback=initMap"></script>

<script>
	$(document).ready(function() {
		google.maps.event.addDomListener(window, 'load', initialize('17.648743237038992','102.78918071964108'));
		
		
		var parameter = {
			jobId: '<?php echo $jobId ;?>',
			lang: '<?php echo $lang ;?>',
			token: btoa("<?php echo $user_id ?>")
		}
		var getFavorite = $.post( '<?php echo $_server?>../job/api/checkFavoriteJob.do?',parameter);
		getFavorite.done(function( data ) {
			console.log(data);
			if (data.responseCode == 200) {
				$('.Fav').html('<i class="fa fa-star p1"></i> <?php echo lang("FAVORITED") ?>');			
			}
		});
		var parameters={
			appId: '<?php echo $this->input->post('appId');?>' ,
			lang: '<?php echo $lang ;?>'
		}
		var getMessage = $.post( '<?php echo $_server?>../jobapplication/api/getMessage.do?',parameters);
		getMessage.done(function( data ) {
			if(data.responseCode==200){
				// console.log(data);
				$('.message').html('');
				// console.log(data.data.length);
				for (var i = 0; i < data.data.length; i++) {
					Messages = data.data[i];
					console.log(Messages);
					if(Messages.userId== '<?php echo $this->input->post('userId');?>'){
						text =	'<div class="row chat-box-chat">'+
									'<div class="col-xs-4">'+
										'<p class="chat-box-date">'+FormatDTFullMounth(Messages.createdDate)+'</p>'+
									'</div>'+
									'<div class="col-xs-8"> '+
										'<div class="bubble-i">'+
											'<span>'+ Messages.message +'</span>'+
										'</div>'+
									'</div>'+
								'</div>';
					}else{
						text =	'<div class="row chat-box-chat">'+
									
									'<div class="col-xs-8"> '+
										'<div class="bubble-j">'+
											'<span>'+ Messages.message +'</span>'+
										'</div>'+
									'</div>'+
									'<div class="col-xs-4">'+
										'<p class="chat-box-date">'+FormatDTFullMounth(Messages.createdDate)+'</p>'+
									'</div>'+
								'</div>';
					}
					$('.chat-box-chats').append(text);
				}
			}
		});
		$('#message').on('keydown', function(e) {
		    if (e.which == 13) {
		    	console.log('sss');
				sendMessage();
		    }
		});

		$('#sendMessage').click(function(event) {
			sendMessage();
		});
		$('.chat-box').click(function(event) {
			ChatBox();
		});
		$('.chat-box-minus').click(function(event) {
			MinusBox();
		});
	});
	
	function application(jobId){
		console.log(jobId);
		parameters = {
			jobId: jobId,
			lang: "<?php echo $lang;?>",
			userId: '<?php echo $user_id?>',
			token: btoa('<?php echo $user_id?>')
		}
		console.log(parameters);
		var api = $.post( '<?php echo $_server?>../jobapplication/api/register.do?',parameters);
		api.done(function( data ) {
			console.log(data);
			if (data.responseCode == 200){
				alert('ส่งใบสมัครเรียบร้อย');
			}
			if(data.responseCode == 406){
				alert(data.responseMessage);
			}
		});
	}
	
	function sendMessage(){
		if($('#message').val()==''){
			$('#message').focus();
		}
		else{
			LoadingPage();
			var parameters = {
				appId: $('#appId').val(),
				userId: $('#userId').val(),
				message: $('#message').val(),
			}
			var getMessage = $.post( '<?php echo $_server?>../jobapplication/api/sendMessage.do?',parameters);
			getMessage.done(function( data ) {
				if(data.responseCode == 200){
					location.reload();
				}
			});
		}
	}

	function FormatDTFullMounth(dateset){
		var convertedStartDate = new Date(dateset);
	    var month = ("0" + (convertedStartDate.getMonth() + 1)).slice(-2)
	    var day = ("0" + convertedStartDate.getDate()).slice(-2);
	    var year = convertedStartDate.getFullYear();
	    switch(month) {
		    case '01':
		        var month = "<?php echo lang('MONTH_01');?>"
		        break;
		    case '02':
		       	var month = "<?php echo lang('MONTH_02');?>"
		        break;
		    case '03':
		       	var month = "<?php echo lang('MONTH_03');?>"
		        break;
		    case '04':
		       	var month = "<?php echo lang('MONTH_04');?>"
		        break;
		    case '05':
		       	var month = "<?php echo lang('MONTH_05');?>"
		        break;
		    case '06':
		       	var month = "<?php echo lang('MONTH_06');?>"
		        break;
		    case '07':
		       	var month = "<?php echo lang('MONTH_07');?>"
		        break;
		    case '08':
		       	var month = "<?php echo lang('MONTH_08');?>"
		        break;
		    case '09':
		       	var month = "<?php echo lang('MONTH_09');?>"
		        break;
		    case '10':
		       	var month = "<?php echo lang('MONTH_10');?>"
		        break;
		    case '11':
		       	var month = "<?php echo lang('MONTH_11');?>"
		        break;
		    case '12':
		       	var month = "<?php echo lang('MONTH_12');?>"
		        break;
		}
	    var shortStartDate = day + ' ' + month + ' ' + year;
	    return shortStartDate;
	}

	function initialize(lat,Long){
		var myCenter=new google.maps.LatLng(lat,Long);
		var marker;
		var mapProp = {
			center:myCenter,
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		var marker=new google.maps.Marker({
			position:myCenter,
		});
		marker.setMap(map);
	}
	
</script>