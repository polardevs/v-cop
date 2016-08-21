<div class="row">
	<div class="col-sm-12 content">
		<div class="box box-nomargin">
				<div id="gallery">
                    <ul class="thumbnails thumb list-unstyled">
                    <?php foreach ($ebook_content as $contents): ?>
                    	<?php foreach ($contents as $key => $value): ?>
	                      <li class="grid box-content">
								<a href="<?php echo site_url();?>ebook/<?php echo $value->c_id; ?>"> 
								<img src="<?php echo urldecode($value->c_thumbnail_m_location); ?>" />
								</a>
								<div class="option">
									<h3><?php echo $value->c_short_name; ?></h3>
									<p><?php echo $value->c_description; ?></p>
									<div>ผู้แต่ง : <?php echo $value->author_name; ?></div>
									<?php if(!is_null($value->c_size)): ?>
									<small><?php echo $value->c_size; ?></small>
									<?php endif; ?>
								</div>
	                      </li>
	                      <?php endforeach; ?>
                      <?php endforeach; ?>
                      <?php foreach ($video_content as $contents): ?>
                      	<?php foreach ($contents as $key => $value): ?>
                      		<li class="grid <?php echo ($value->c_id % 4 == 0)? "wide":""; ?> box-content" >
                      			<embed src="<?php echo urldecode($value->c_source_url); ?>">
                      			<div class="option">
                      				<h3><?php echo $value->c_short_name; ?></h3>
									<p><?php echo allowTagHTML($value->c_description); ?></p>
									<div><?php echo $value->author_name; ?></div>
									<div><?php echo $value->rating; ?></div>
                      			</div>
	                      </li>
                      	<?php endforeach; ?>
                      <?php endforeach; ?>
                    </ul>
                </div>
		</div>
	</div>
</div>

<div class="clearfix"></div>