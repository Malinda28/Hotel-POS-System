<?php 	
		/* if(isset($Mchek))
		:	
		$Start_date=date("F ,Y", strtotime($Start_date));
		$End_date=date("F ,Y", strtotime($End_date));		
		endif;
		 */
		/* else{
			$Start_date=date("F d,Y", strtotime($Start_date));
			$End_date=date("F d,Y", strtotime($End_date));	
			} */
		?>
		
<div class="col-xs-12">
	
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Summary Report </h3>
			
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				
			</div>
			
		</div>
		<div class="box-body" id="summary-report">
		
		<div class="row">
		<div class="col-xs-6">
		<h4 class="box-title" id="Print-Title"></h4>
		</div>
		<div class="col-xs-6">
		<h4 class="box-title pull-right"><span class="text-green"><?php echo $Start_date;?></span> - <span class="text-green"><?php echo $End_date;?></span></h4>
		
		</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover" id="compareul">
				
				<tr>
					<th>Date</th> 
					<th>Rooms</th>
					<th>Resturant</th> 	
					<th>Bar</th> 	
					<th>Sub Total</th> 
					<th>Service Charge</th> 
					<th>Net Total</th> 
					
				</tr>
				<?php
					
					$room_sales=number_format(0, 2, '.', '');
					$bar_sales=number_format(0, 2, '.', '');
					$res_sales=number_format(0, 2, '.', '');
					$subtotal=number_format(0, 2, '.', '');
					$service=number_format(0, 2, '.', '');
					$nettotal=number_format(0, 2, '.', '');
					
					foreach($SALES as $sale)
					{
						
						echo "<tr>
						<td>".$sale['Date']."</td>
						<td>".$sale['Rooms']."</td>
						<td>".$sale['Resturant']."</td>
						<td>".$sale['Bar']."</td>
						<td>".$sale['Sub_total']."</td>
						<td>".$sale['Service']."</td>
						<td>".$sale['Total']."</td>
						
						</tr>";
						
						//$i_line++;
						$room_sales=bcadd($room_sales,$sale['Rooms'],2);
						$bar_sales=bcadd($bar_sales,$sale['Bar'],2);
						$res_sales=bcadd($res_sales,$sale['Resturant'],2);
						$subtotal=bcadd($subtotal,$sale['Sub_total'],2);
						$service=bcadd($service,$sale['Service'],2);
						$nettotal=bcadd($nettotal,$sale['Total'],2);
					}
				?>
			</table>
		</div>	
			<div class="row">
				<div class="col-sm-4 col-xs-6">
					<div class="description-block border-right">
						
						<h5 class="description-header text-green">Rs. <?php echo $room_sales;?></h5>
						<span class="description-text">TOTAL ROOM SALES</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-4 col-xs-6">
					<div class="description-block border-right">
						<h5 class="description-header text-green">Rs. <?php echo $res_sales;?></h5>
						<span class="description-text">TOTAL Resturant SALES</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-4 col-xs-6">
					<div class="description-block ">
						<h5 class="description-header text-green">Rs. <?php echo $bar_sales;?></h5>
						<span class="description-text">TOTAL Bar SALES</span>
					</div>
					<!-- /.description-block -->
				</div>
			</div>
			<!-- /.col -->
			<div class="row">
				
				<div class="col-sm-4 col-xs-6">
					<div class="description-block border-right">
						<div class="description-block">
							<h5 class="description-header text-green">Rs. <?php echo $subtotal;?></h5>
							<span class="description-text">Sub Total</span>
						</div>
						<!-- /.description-block -->
					</div>
				</div>
				<div class="col-sm-4 col-xs-6">
					<div class="description-block border-right">
						<div class="description-block">
							<h5 class="description-header text-green">Rs. <?php echo $service;?></h5>
							<span class="description-text">Service Charge</span>
						</div>
						<!-- /.description-block -->
					</div>
				</div>
				<div class="col-sm-4 col-xs-6">
					<div class="description-block ">
						<div class="description-block">
							<h5 class="description-header text-green">Rs. <?php echo $nettotal;?></h5>
							<span class="description-text">Net Total</span>
						</div>
						<!-- /.description-block -->
					</div>
				</div>

			</div>

	</div>
		<div class="box-footer clearfix">
			<button  class="btn btn-default" onclick="printContent()"><i class="fa fa-print"></i> Print</button>
		</div>
		
	</div>
</div>		

<script>
function printContent(){
	
	//alert(name); 
	//return;
	//document.getElementById("Ename").innerHTML= name ;
	//document.getElementById("Ecompany").innerHTML= company ;
	
	var restorepage = document.body.innerHTML;
	
	document.getElementById('Print-Title').innerHTML='Sales Summary Report';
	var printcontent = document.getElementById('summary-report').innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
	document.getElementById('Print-Title').innerHTML='';
	Drangepicker();
	Mpicker();
	var ctx = document.getElementById("Sales-Chart").getContext("2d");
	window.myLine = new Chart(ctx, config);
	
}</script>