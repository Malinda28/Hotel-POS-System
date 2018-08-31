<section class="content-header">
	
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
	<?php endif?>
	<!--h1>Reservation</h1-->
</section>

<?php
	$ORDERS=array_merge($KOT,$BOT);
	
	sort($ORDERS);
	
	
	function cmp($ORDERS,$ord){
		return strtotime($ORDERS['date_time'])>strtotime($ord['date_time'])?1:-1;
	};
	
	uasort($ORDERS,'cmp');
	//print_r($ORDERS);
	
	
?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header with-border">
					
					<?php echo CHtml::link('Generate Invoice',array('create',
                   'gid'=>$GID),array('class'=>'btn  btn-success btn-sm pull-right','id'=>'gen_invoice')) ; ?>
					<button class="btn  btn-warning  btn-sm pull-right" value="BOT">New BOT</button>
										<button class="btn btn-sm btn-info pull-right" value="KOT">New KOT</button>
					<h3 class="box-title">Customer Details</h3>
					
				</div>
				
				<div class="box-body " id="box-body">	
					<div class="row">
						<div class="col-xs-12">
						
						<?php	if(isset($ROOMS)):
									
									if(count($ROOMS)>0){
											?>
							<div class="row ">
								<div class="col-xs-4">
									
									<?php  if(isset($CUS[0])):?>
									<dl><dd>Customer Name: <b><?php
									
										echo $CUS[0]["customer_name"];
												
											?>
											</b></dd></dl>								
									<?php endif?>
								</div>
								<div class="col-xs-4">
									
									<?php  if(isset($CUS[0])):?>
									<dl><dd>check_in_date_time: <b><?php echo $CUS[0]["check_in_date_time"];?></b></dd></dl>								
									<?php endif?>
								</div>
								<div class="col-xs-4">
									
									<?php  if(isset($CUS[0])):?>
									<dl><dd>check_in_date_time: <b><?php echo $CUS[0]["check_out_date_time"];?></b></dd></dl>								
									<?php endif ?>
								</div>
								
								
								</div>
							<div class="row ">
								<div class="col-xs-12">
									<h4 class="box-title">Reservation Details</h4>
									<div class="table-responsive">
										<table class="table table-hover" id="compareul">
											
											<tr>
												<th>Room Number</th> 
												<th>Type</th>
												<th>Adults</th> 	
												<th>Children</th> 
												
												
											</tr>
											
											<?php
												
											 	
												$an=0; $opt_ad=''; $opt_ch='';
												foreach($ROOMS as $RM){
													
													$room=MainData::Room_Detail($RM['room_no']);
													
													foreach($room as $rm)
													{
														
														
														echo "<tr><td>".$RM['room_no']."</td>
														<td><span class='label label-info'>".$rm['facility']."-".$rm['content']."</span></td>
														<td>".$RM['adults']."</td>
														
														<td>".$RM['children']."</td>
														
														
														</tr>";
														
													}
													
													//	echo'<script>document.getElementById("ReservationDetail['.$an.'][adults]").selectedIndex='.$RM['adults'].';</script>';
													$an++;
												}
												
												
											?>
											
											
											
										</table>
										
									</div>
									<hr>
								</div>
							</div>
							
									<?php } endif?>
							
							<div class="row ">
								<?php 
									
									if(count($ORDERS)>0){
										
										if($ORDERS[0]['room_no']>0)
										{
											$Col2="Room Number";
											
											$colval="room_no";
										}
										else{
											
											$Col2="Table Number";
											$colval="table_no";
											}
										
										
										?>
									<div class="col-xs-12">
										
										
										<h4 class="box-title">Order Details</h4>
										<table class="table table-hover" id="compareul">
											
											<tr>
												<th>Order Number</th> 
												<th><?php echo $Col2;?></th> 	
												<th>Date</th>
											</tr>
											<?php foreach($ORDERS as $ORD)
												{
													echo '<tr>';
													if($ORD['type']=="K"){
														
														echo "
														<td><span class='label label-info'>".$ORD['ticket_id']."</span></td>
														<td>".$ORD[$colval]."</td>
														<td>".$ORD['date_time']."</td>
														
														
														
														
														";
													}
													
													else {
														
														echo "<tr>
														<td><span class='label label-warning'>".$ORD['ticket_id']."</span></td>
														<td>".$ORD[$colval]."</td>
														<td>".$ORD['date_time']."</td>
														
														
														
														
														</tr>";
														
													}	
													
													echo '</tr>';
													
												}
												
												
												
												
											?>
											
										</table>
									</div>
									
								<?php }?>
							</div>
							
						</div>
					</div>
				</div>
				<div class="box-footer clearfix"  id="box-footer">
					<div class="buttons">
						
						
						<?php // echo CHtml::link( 'Generate Invoice', array('submit' => array('site/register',array('class'=>'btn  btn-success btn-sm pull-right','id'=>'gen_invoice'))); ?>
						
						<?php // echo CHtml::button('Register', array('submit' => array('site/register'))); ?>
						<?php // echo CHtml::link('LinkText',array('site/register'),array('class'=>'btn_registro')); ?>
						<?php echo CHtml::link('Generate Invoice',array('create',
                   'gid'=>$GID),array('class'=>'btn  btn-success btn-sm pull-right','id'=>'gen_invoice')) ; ?>
					
					
					</div>
					<?php // $this->endWidget(); ?>
				</div>
			</div>
			
			
			
		</div>
	</div>
	
</section>	

