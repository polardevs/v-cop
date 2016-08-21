<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center">ตำแหน่งว่างงาน</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="col-sm-12"  style="border: 1px solid #ccc;">
				<h6>ค้นหาตำแหน่งว่างงานตามจังหวัด</h6>
				<div id="vmap" style="width: 100%; height: 350px;"></div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="row">
				<div class="col-xs-6 text-right bg-blue">
					<h6>จำนวนงานทั่วประเทศ</h6>
				</div>
				<div class="col-xs-3 text-center bg-blue">
					<h6><?php echo lang('FORM_POSITION') ?></h6>
				</div>
				<div class="col-xs-3 text-center bg-blue">
					<h6>อัตรา</h6>
				</div>
			</div>
				<div id="RegionStat"></div>
			<div class="row">
				<div class="col-xs-6 text-right">
					<strong class="margin-b-15">สรุปจำนวนรวมทั้งประเทศ</strong>
				</div>
				<div class="col-xs-3 text-center">
					<co id="sumRegion"></co>
				</div>
				<div class="col-xs-3 text-center">
					<co id="sumPosition"></co>
				</div>
			</div>
		</div>
		<div class="col-sm-4" style="height:400px;">
		  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    	<!-- Indicators -->
			    <ol class="carousel-indicators" style="bottom: 0px;">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			    </ol>
			
			    <!-- Wrapper for slides -->
			    <div class="carousel-inner" role="listbox">
			      	<div class="item active" style="height:400px;">
			        	<div class="col-xs-12 bg-blue">
							<h6>ตำแหน่งงานเข้าชมสูงสุด</h6>
						</div>
						<div id="TopView"></div>
			      	</div>
				    <div class="item" style="height:400px;"> 
				        <div class="col-xs-12 bg-blue">
							<h6>ตำแหน่งที่มีการสมัครสูงสุด</h6>
						</div>
						<div id="TopReg"></div>
				    </div>
			      	<div class="item" style="height:400px;">
			        	<div class="col-xs-12 bg-blue">
							<h6>ตำแหน่งที่มีการสมัครสูงสุด</h6>
						</div>
						<div id="TopInteresting"></div>
			      	</div>
			    </div>
		  	</div>
		</div>
	</div>
</div>