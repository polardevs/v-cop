<?php $active="active";
echo $this->uri->segment(1); 

function chkActiveMenu($menu) {
	$url = $this->uri->segment(1);
	if ($menu == $url) 
	echo "active";
}

?>
<ul class="nav nav-pills nav-stacked">
	<li><i class="fa fa-pencil-square-o"></i> ข้อมูลส่วนตัว
		<ul class="menu-stydent">
			<li>อัพเดทสถานะนักศึกษา</li>
			<li><a href="<?php echo site_url(); ?>profile" class="<?php ?>">แก้ไขข้อมูลนักศึกษา</a></li>
			<li>ประวัติการทำงาน</li>
			<li>ประวัติการอบรม</li>
			<li>ผลงานอื่นๆ</li>
		</ul>
	</li>
	<li><i class="fa fa-pencil-square-o"></i> ข้อมูลการสมัครงาน
		<ul class="menu-stydent">
			<li>ค้นหาตำแหน่งงาน/ฝึกงาน</li>
			<li>ประวัติการสมัครงาน</li>
			<li>ประวัติการฝึกงาน</li>
			<li>การติดต่อจากสถานประกอบการ</li>
			<li>แฟ้มเก็บตำแหน่งงาน</li>
		</ul>
	</li>
	<li><i class="fa fa-pencil-square-o"></i> งานที่น่าสนใจ
		<ul class="menu-stydent">
			<li>ตำแหน่งงานที่รับสมัครด่วน</li>
			<li>ตำแหน่งงานใหม่ประจำวัน</li>
		</ul>
	</li>
	<li>
		<ul class="menu-stydent">
			<li><a href="<?php echo site_url(); ?>">ออกจากระบบ</a></li>
		</ul>
	</li>
</ul>
