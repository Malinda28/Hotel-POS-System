<div id="content">
	
		<!-- breadcrumbs -->
	
<section class="content-header">
   
			
</section>


<!-- Main content -->
<section class="content" id="invoice">
	<!-- title row -->
	<div class="invoice">
	<div class="row">
        <div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i> Hill Horizon Hotel
				<small class="pull-right">Date: <?php echo $Date; ?></small>
			</h2>
		</div>
        <!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
       <div class="col-sm-12 invoice-col"> 
	   <address class="pull-left">
		   
				<strong>Hotel Hill Horizon<br>
					Wattala<br>
					Phone: 033-2261025<br>
				Email: Hotelhillhorizon@gmail.com</strong>
			</address>
        <!-- /.col -->
        
			
		</div>
        <!-- /.col -->
        
        <!-- /.col -->
	</div>
	<!-- /.row -->
	
	<!-- Table row -->
	<div class="row">
        <div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Description</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Sub Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i_line=1;
						$subtotal=0.00;
						/* print_r($Room_data);
						exit(); */
						if(isset($Room_data)):
						foreach($Room_data as $Room)
						{
							
							echo "<tr>
							<td>".$i_line."</td>
							<td>".$Room['Description']."</td>
							<td>".$Room['Quantity']."</td>
							<td>".$Room['UPrice']."</td>
							<td>".$Room['Subtotal']."</td>
							</tr>";
							
							$i_line++;
							$subtotal=bcadd($subtotal,$Room['Subtotal'],2);
						}
						
						endif;
						
						if(isset($Kot_data)):
						
						foreach($Kot_data as $Kot)
						{
							
							echo "<tr>
							<td>".$i_line."</td>
							<td>".$Kot['Description']." - ".$Kot['Portion']."</td>
							<td>".$Kot['Quantity']."</td>
							<td>".$Kot['UPrice']."</td>
							<td>".$Kot['Subtotal']."</td>
							</tr>";
							
							$i_line++;
							$subtotal=bcadd($subtotal,$Kot['Subtotal'],2);
						}
						endif;
						
						if(isset($Bot_data)):
						
						foreach($Bot_data as $Bot)
						{
							
							echo "<tr>
							<td>".$i_line."</td>
							<td>".$Bot['Description']." - ".$Bot['Volume']."ml</td>
							<td>".$Bot['Quantity']."</td>
							<td>".$Bot['UPrice']."</td>
							<td>".$Bot['Subtotal']."</td>
							</tr>";
							
							$i_line++;
							$subtotal=bcadd($subtotal,$Bot['Subtotal'],2);
						}
						endif
					?>
					
					
					
				</tbody>
			</table>
		</div>
        <!-- /.col -->
	</div>
	<!-- /.row -->
	
	<div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-12">
			
			
			<div class="table-responsive pull-right">
				<table class="table">
					<tr>
						<th style="width:50%">Subtotal:</th>
						<td><?php echo $subtotal;?></td>
					</tr>
					<tr>
						<th>Service Charge (10%)</th>
						<?php $Service= bcmul(bcdiv($subtotal,100,2),10,2);?>
						<td><?php echo $Service;?></td>
					</tr>
					<tr><?php $Total= bcadd($subtotal,$Service,2);?>
						<th>Total:</th>
						<td><?php echo $Total;?></td>
					</tr>
				</table>
			</div>
		</div>
        <!-- /.col -->
	</div>
	<!-- /.row -->
	
	<!-- this row will not appear when printing -->
	<div class="row no-print">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'invoice-form',
			
			'enableAjaxValidation'=>false,
		)); ?>
		
		<?php 
			echo $form->hiddenField($model,'pre_gen_id',array('size'=>20,'maxlength'=>20,'value'=>$gid)); 
			echo $form->hiddenField($model,'sub_total',array('value'=>$subtotal));
			echo $form->hiddenField($model,'net_total',array('value'=>$Total));
			echo $form->hiddenField($model,'date_time',array('value'=>$Date));
		?>
		
		
        <div class="col-xs-12">
			<button  class="btn btn-default" onclick="printContent()"><i class="fa fa-print"></i> Print</button>
			<button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
			</button>
			
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>
<!-- /.content -->
</div>
<script>

function printContent(){
	
	//alert(name); 
	//return;
	//document.getElementById("Ename").innerHTML= name ;
	//document.getElementById("Ecompany").innerHTML= company ;
	
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById('invoice').innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>