<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.js"></script>

<div class="container">
	<h2>จำนวนนักศึกษาที่หางานได้</h2>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<canvas id="myChart"></canvas>
		</div>
	</div>
	<h5 class="padding-t-20">ตารางแสดงจำนวนนักศึกษาที่หางานได้ ตามระดับการศึกษาและสาขาวิชา</h5>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ระดับการศึกษา</th>
				<th>สาขาวิชา</th>
				<th class="text-center">จำนวนนักศึกษาที่หางานได้</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
		LoadingPage();
		var SubjectStat = $.post('<?php echo $_server?>../frontIndex/api/getMatchingSubjectStat.do?');
		SubjectStat.done(function( data ) {
			if (data.responseCode == 200) {
				for (var i = 0; i < data.data.dataList.length; i++) {
					Stat = data.data.dataList[i];
					console.log(Stat);
					text = '<tr>'+
								'<td>'+
									Stat.level +
								'</td>'+
								'<td>'+
									Stat.subject +
								'</td>'+
								'<td class="text-center">'+
									Stat.cnt +
								'</td>'+
							'<tr>';
	   				$('tbody').append(text);
				}
			}
		});

		var ctx = document.getElementById("myChart");
		var Matching = $.post('<?php echo $_server?>../frontIndex/api/getMatchingLevelStat.do?');
		Matching.done(function( data ) {
			if (data.responseCode == 200) {
				var label = [];
				var sumCnt = [];
				$.each(data.data.dataList, function() {
					label.push(this.level);
					sumCnt.push(this.sumCnt);
				});
				var myChart = new Chart(ctx, {
				    type: 'bar',
				    data: {
				        labels: label,
				        datasets: [{
				            label: '',
				            data: sumCnt,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    options: {
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true
				                }
				            }]
				        },
				        legend: {
            				display: false
         				},	
				    }
				});
			UnLoadingPage();
			}
		});
	});
</script>