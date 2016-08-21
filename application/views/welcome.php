<?php 
$redirec = (isset($getImage->data->statusId))? (isset($getImage->data->statusId)) :'';
if ($redirec) {
?>
<img  class="img-welcome center-block" src="<?php echo $getImage->data->imageFilePath; ?>" class="center-block">
<form method="post" action="<?php echo site_url(); ?>">
	<input type="hidden" name="welcome" value="welcome">
	<button class="btn btn-success center-block margin-t-20" style="margin-bottom: 15px;"> เข้าสู่หน้าหลัก</button>
</form>
<?php 
} 
?>
<script>
	var redirec = '<?php echo $redirec;?>';
	if(!redirec) window.location = '<?php echo site_url();?>';
</script>