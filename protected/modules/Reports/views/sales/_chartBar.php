<?php /* $Start_date=date("F d,Y", strtotime($Start_date));
	$End_date=date("F d,Y", strtotime($End_date)); */
			
			$DateJS = array_column($SALES,'Date');
			$RoomsJS = array_column($SALES,'Rooms');
			$RoomsJS = json_encode($RoomsJS);
			$ResJS = array_column($SALES,'Resturant');
			$ResJS = json_encode($ResJS);
			$BarJS = array_column($SALES,'Bar');
			$BarJS = json_encode($BarJS);
			

		?>
		

		
				<div class="col-xs-12">
					<!-- LINE CHART -->
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Graphical Report</h3>
							
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								
							</div>
						</div>
						<div class="box-body">
							<div class="chart">
								<canvas id="Sales-Chart" ></canvas>
							</div>
							
							
							<?php if(count($SALES)>1){ ?>
							<div class="chart">
								
							<?php	$this->renderPartial('_chartLine', array('SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,'MD'=>$MD)); ?>
							</div>
							
							<?php	}?>
							
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>		
			
		<script>
			var configB = {
				type: 'bar',
				data: {
					labels: <?php echo json_encode( $DateJS );?>,
					datasets: [{
						label: "Room",
						fill: false,
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
						data: <?php echo str_replace('"',"",$RoomsJS);?>,
						}, {
						label: "Resturant",
						
						backgroundColor: window.chartColors.green,
						borderColor: window.chartColors.green,
						
						data: <?php echo str_replace('"',"",$ResJS);?>,
						}, {
						label: "Bar",
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: <?php echo str_replace('"',"",$BarJS);?>,
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
		