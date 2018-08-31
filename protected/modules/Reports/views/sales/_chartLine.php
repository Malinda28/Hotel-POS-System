<?php /* $Start_date=date("F d,Y", strtotime($Start_date));
	$End_date=date("F d,Y", strtotime($End_date)); */
			
			$DateJS = array_column($SALES,'Date');
			$TotalJS = array_column($SALES,'Total');
			$TotalJS = json_encode($TotalJS);
			
			

		?>
		
<hr>
								<canvas id="Sales-Chart-Line" ></canvas>
							
			
		<script>
			var configL = {
				type: 'line',
				data: {
					labels: <?php echo json_encode( $DateJS );?>,
					datasets: [
					{
						label: "Bar",
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: <?php echo str_replace('"',"",$TotalJS);?>,
						fill: true,
					}]
				},
				options: {
					responsive: true,
					title:{
						display:true,
						text:'<?php echo $Start_date.' - '.$End_date;?>'
					},
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: '<?php echo $MD;?>'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Rs.'
							}
						}]
					}
				}
			};
			
			
		</script>
		