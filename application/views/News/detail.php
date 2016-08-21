<div class="container container-body">
	<?php 
		if (isset($Article)) {
			$Articles = $Article->data;
			?>
				<h2><?php echo $Articles->title;?></h2>
				<hr style="margin-top: 15px;">

				<div class="row" style="margin: 20px;" >
					<div class="col-md-12">
						<img src="<?php echo $Articles->coverPath;?>" width="250">
					</div>
				</div>
				<div class="row" style="margin: 20px;" >
					<div class="col-md-12">
						<p><?php echo $Articles->detail;?></p>
					</div>
				</div>
				<div class="row" style="margin: 20px;" >
				<?php
				foreach ($Articles->images as $key => $images) {
				?>
					<div class="col-md-6">
						<img class="img-responsive" src="<?php echo $images->filePath;?>">
					</div>
				<?php
				}
				?>
				</div>

				<div class="row" style="margin: 20px;" >
					<div class="col-md-12">
						<?php 
						echo lang('ARTICLE_UPDATE') ." "; 
						echo (isset($Articles->updatedDate))? date_format(date_create($Articles->updatedDate),"d-m-Y") : date_format(date_create($Articles->createdDate),"d-m-Y"); 
						echo " ". lang('ARTICLE_VIEW') ." ". $Articles->cntView ." ". lang('ARTICLE_COUNT');?> 
					</div>
				</div>
			<?php
			// }
		}	
	?>
	
</div>