<?php foreach ($product as $products): ?>
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-3">
				<div class="box">
                    <div class="box-content">
                      <img class="img-responsive" src="<?php echo urldecode($products->c_thumbnail_s_location); ?>" style="width: 100%; height: auto;">
                    </div>
                  </div>  
                  <?php if($this->session->userdata('is_logged_in') === true): ?>
                    	<button class="btn btn-primary btn-block" id="download" type="button" data-loading-text="Loading..." autocomplete="off" data-id="<?php echo $products->c_id; ?>">ดาวน์โหลด</button>
                    <?php endif; ?>
			</div>
			<div class="col-sm-9">
				<div class="box">
                    <div class="box-content box-double-padding">
                    	<div class="row">
                          <div class="col-sm-12">
                            <div class="lead">   
                              <div> <?php echo $products->c_name; ?></div>
                              <div class="text-muted"><i class="icon-tags"></i> <?php echo $products->c_meta; ?></div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <?php if($content_type == 1): ?>
                          <div class="text-right"><?php echo $products->author_name; ?></div>
                          <div class="text-right"><?php echo $products->publisher_name; ?></div>  
                          <div class="text-right"><?php echo $products->c_size; ?></div>  
                          <?php endif; ?>
                          
                          <div class="form-actions form-actions-padding" style="margin-bottom: 10px;"><?php echo $products->c_description; ?></div>
                          <div class="text-right"><span class="timeago fade has-tooltip in" data-placement="top" title='<?php echo $products->create_date; ?>'><?php echo $products->create_date; ?></span></div>
                          
                          <?php if(!empty($products->rating)): ?>
                          <h2 class="text-warning" title="rating" >
                          	<small>Rating : <?php echo $products->rating; ?></small><br>
                          	<?php echo $this->star_model->get($products->rating); ?>
                          </h2>	
                          <?php endif; ?>
                    </div>
                  </div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
<script>
  $('#download').on('click', function () {
	var $btn = $(this).button('loading');
    
    var server = "<?php echo base_url(); ?>service/download";
    var c_id = $(this).data('id');
    var downloadURL = '';
    
    var step1 = $.post( server , {method : 'purchase', c_id: c_id});
    step1.done(function( data ) {
		var jsonstep1 = $.parseJSON(data);
		console.log(jsonstep1);
		console.log("-------------- jsonstep1 --------------");
		if(jsonstep1.res_code == '200' && jsonstep1.data == undefined){
			
			var step2 = $.post( server , {method : 'request_download', c_id: c_id});

			step2.done(function( data2 ) {
				var jsonstep2 = $.parseJSON(data2);
				console.log(jsonstep2);
				console.log("-------------- jsonstep2 --------------");
				if(jsonstep2.res_code == '200'){
					var subURL = getParams(decodeURIComponent(jsonstep2.data));
					console.log(subURL);
					console.log("-------------- subURL --------------");
					
					var step3 = $.post( server , subURL);

					step3.done(function( data3 ) {
						var jsonstep3 = $.parseJSON(data3);
						console.log(jsonstep3);
						console.log("-------------- jsonstep3 --------------");
						downloadURL = decodeURIComponent(jsonstep3.data);
						var subDownloadURL = getParams(downloadURL);
						console.log(downloadURL);
						console.log("-------------- downloadURL --------------");
						console.log(subDownloadURL);
						console.log("-------------- subDownloadURL --------------");

						if(jsonstep3.res_code == '200'){
							var step4 = $.post( server , {method : 'finish_download', c_id: c_id, log_id: subURL.log_id});
							
							step4.done(function( data4 ) {
								var jsonstep4 = $.parseJSON(data4);
								console.log(jsonstep4);
								console.log("-------------- jsonstep4 --------------");

								if(jsonstep4.res_code == '200'){
									var step5 = $.post( server , {method : 'activate', c_id: c_id, log_id: subURL.log_id});
									
									step5.done(function( data5 ) {
										var jsonstep5 = $.parseJSON(data5);
										console.log(jsonstep5);
										console.log("-------------- jsonstep5 --------------");

										if(jsonstep5.res_code == '200'){
											window.open(downloadURL, '_blank');
// 											$("#open").attr('src', downloadURL);
											$btn.button('reset');
										}
									});
								}
							});
						}
					});
				}
			});
		} else {

			var subURL = getParams(decodeURIComponent(jsonstep1.data));
			console.log(subURL);
			console.log("-------------- subURL --------------");
			
			var step3 = $.post( server , subURL);
			
			step3.done(function( data3 ) {
				var jsonstep3 = $.parseJSON(data3);
				console.log(jsonstep3);
				console.log("-------------- jsonstep3 --------------");
				downloadURL = decodeURIComponent(jsonstep3.data);
				var subDownloadURL = getParams(downloadURL);
				console.log(downloadURL);
				console.log("-------------- downloadURL --------------");
				console.log(subDownloadURL);
				console.log("-------------- subDownloadURL --------------");

				if(jsonstep3.res_code == '200'){
					var step4 = $.post( server , {method : 'finish_download', c_id: c_id, log_id: subURL.log_id});
					
					step4.done(function( data4 ) {
						var jsonstep4 = $.parseJSON(data4);
						console.log(jsonstep4);
						console.log("-------------- jsonstep4 --------------");

						if(jsonstep4.res_code == '200'){
							var step5 = $.post( server , {method : 'activate', c_id: c_id, log_id: subURL.log_id});
							
							step5.done(function( data5 ) {
								var jsonstep5 = $.parseJSON(data5);
								console.log(jsonstep5);
								console.log("-------------- jsonstep5 --------------");

								if(jsonstep5.res_code == '200'){
									window.open(downloadURL, '_blank');
									console.log(downloadURL);
// 									$("#open").attr('src', downloadURL);
									$btn.button('reset');
								}
							});
						}
					});
				}
			});
		}

	});
  });

  function getParams(url) {
	    var regex = /([^=&?]+)=([^&#]*)/g, params = {}, parts, key, value;

	    while((parts = regex.exec(url)) != null) {

	        key = parts[1], value = parts[2];
	        var isArray = /\[\]$/.test(key);

	        if(isArray) {
	            params[key] = params[key] || [];
	            params[key].push(value);
	        }
	        else {
	            params[key] = value;
	        }
	    }

	    return params;
	}
</script>
