<!-- company -->
    <?php echo css_asset("company-style.css", "common"); ?>
<!-- company -->

<div class="container body-company">
	<div class="row">
		<div class="col-sm-12">
			<?php
				$responseCode = $this->input->get('responseCode', TRUE);
				if ($responseCode == 200) {	
			?>
					<div class="text-center h3">รอติดต่อกลับทาง email <a href="<?php echo base_url('auth/logout'); ?>" >กดเพื่อเข้าสู่หน้าหลัก</a></div>
			<?php
				}
				else{
					echo '<div class="text-center redirect"> ไม่สามารถลงทะเบียนได้ ' . $this->input->get('responseMessage', TRUE)
			?>
					<a onclick="goBack();">กดเพื่อกลับไปแก้ไข</a></div>
			<?php
				}
			?>
		</div>
	</div>
</div>

<script>
var responseCode = '<?php echo $responseCode ;?>';
function goBack() {
    window.history.back();
}
</script>