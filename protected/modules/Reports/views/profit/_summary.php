<?php $Start_date=date("F, Y", strtotime($Start_date));
	$End_date=date("F, Y", strtotime($End_date));
	

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
					<h4 class="box-title pull-right">
						<span class="text-green"><?php echo $Start_date;?> </span> - 
						<span class="text-green"><?php echo $End_date;?></span>
					</h4>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped" id="compareul">
					
					<tr>
						<th>Month</th> 
						<th>Administration <br/>Expenses</th>
						<th>Sales and Distribution<br/> Expenses</th> 	
						<th>Financial Expenses<br/> and Others</th> 	
						<th>Expenses Total</th> 
						<th>Sales Total</th> 
						<th>Profit</th> 
						
					</tr>
					<?php
						
						$AE=number_format(0, 2, '.', '');
						$SDE=number_format(0, 2, '.', '');
						$FEO=number_format(0, 2, '.', '');
						$Expen_Total=number_format(0, 2, '.', '');
						$Sales_Total=number_format(0, 2, '.', '');
						$Pro_Total=number_format(0, 2, '.', '');
						
						foreach($PROFIT as $profit)
						{
							$pro=bcsub($profit['Sales_Total'],$profit['Expen_Total'],2);
							echo "<tr>
							<td>".date("Y- F", strtotime($profit['Month']))."</td>
							<td>".$profit['AE']."</td>
							<td>".$profit['SDE']."</td>
							<td>".$profit['FEO']."</td>
							<td>".$profit['Expen_Total']."</td>
							<td>".$profit['Sales_Total']."</td>";
							
							if($pro<0){
								echo"<td class='text-red'>".$pro."</td>";
							}
							else
							{echo"<td >".$pro."</td>";
							}
							echo"</tr>";
							
							//$i_line++;
							$AE=bcadd($AE,$profit['AE'],2);
							$SDE=bcadd($SDE,$profit['SDE'],2);
							$FEO=bcadd($FEO,$profit['FEO'],2);
							$Expen_Total=bcadd($Expen_Total,$profit['Expen_Total'],2);
							$Sales_Total=bcadd($Sales_Total,$profit['Sales_Total'],2);
							$Pro_Total=bcadd($Pro_Total,$pro,2); 
						}
					?>
				</table>
				</div>	
				<div class="row">
					<div class="col-sm-4 col-xs-6">
						<div class="description-block border-right">
							
							<h5 class="description-header text-green">Rs. <?php echo $AE;?></h5>
							<span class="description-text">TOTAL ROOM SALES</span>
						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 col-xs-6">
						<div class="description-block border-right">
							<h5 class="description-header text-green">Rs. <?php echo $SDE;?></h5>
							<span class="description-text">TOTAL Resturant SALES</span>
						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 col-xs-6">
						<div class="description-block ">
							<h5 class="description-header text-green">Rs. <?php echo $FEO;?></h5>
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
							<h5 class="description-header text-green">Rs. <?php echo $Expen_Total;?></h5>
							<span class="description-text">Sub Total</span>
						</div>
						<!-- /.description-block -->
					</div>
				</div>
				<div class="col-sm-4 col-xs-6">
					<div class="description-block border-right">
						<div class="description-block">
							<h5 class="description-header text-green">Rs. <?php echo $Sales_Total;?></h5>
							<span class="description-text">Service Charge</span>
						</div>
						<!-- /.description-block -->
						</div>
					</div>
					<div class="col-sm-4 col-xs-6">
						<div class="description-block ">
							<div class="description-block">
								<?php
									if( $Pro_Total<0){
										echo '<h5 class="description-header text-red">Rs. '.$Pro_Total.'</h5>';
									}
									else{
										'<h5 class="description-header text-green">Rs. '.$Pro_Total.'</h5>';
									}
								?>
								<span class="description-text">Profit</span>
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
			
			document.getElementById('Print-Title').innerHTML='Profit Summary Report';
			var printcontent = document.getElementById('summary-report').innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
			document.getElementById('Print-Title').innerHTML='';
			Mpicker();
			
				var ctx = document.getElementById("Profit-Chart").getContext("2d");
			window.myLine = new Chart(ctx, config); 
			
		}</script>				