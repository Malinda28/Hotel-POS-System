<?php $Start_date=date("F d,Y", strtotime($Start_date));
	$End_date=date("F d,Y", strtotime($End_date));
			
			$DateJS = array_column($PROFIT,'Month');
			
			$ExpenJS = array_column($PROFIT,'Expen_Total');
			
			$SalesJS = array_column($PROFIT,'Sales_Total');

			$subtracted = array_map(function ($x, $y) { return $y-$x; } , $ExpenJS, $SalesJS);
			$ProfitJS= array_combine(array_keys($SalesJS), $subtracted);
			$ProfitJS = json_encode($ProfitJS);
			$ExpenJS = json_encode($ExpenJS);
			$SalesJS = json_encode($SalesJS);
			//echo $ProfitJS; 
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
								<canvas id="Profit-Chart" ></canvas>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>		
			
		<script>
			var config = {
				type: 'line',
				data: {
					labels: <?php echo json_encode( $DateJS );?>,
					datasets: [{
						label: "Sales",
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: <?php echo str_replace('"',"",$SalesJS);?>,
						fill: false,
						}, {
						fill: false,
						label: "Expenses",
						backgroundColor: window.chartColors.green,
						borderColor: window.chartColors.green,
						data: <?php echo str_replace('"',"",$ExpenJS);?>,
						}, {
						label: "Profit",
						fill: false,
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
						data: <?php echo str_replace('"',"",$ProfitJS);?>,
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
								labelString: 'Date'
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
		