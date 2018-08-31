<?php
	/* @var $this ReservationController */
	/* @var $customer Reservation */
	$Reservation ='active';
	
	$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Availabilty',
	);
	
	$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
	);
?>

<style>
	.breadcrumbs{
	float: right;
	
}</style>
<section class="content-header">
	
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
	<?php endif?>
	<h1>Reservation</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Customer Details</h3>
					
				</div>
				<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'customer-form',
								// Please note: When you enable ajax validation, make sure the corresponding
								// controller action is handling ajax validation correctly.
								// There is a call to performAjaxValidation() commented in generated controller code.
								// See class documentation of CActiveForm for details on this.
								'enableAjaxValidation'=>false,
								)); 
								
								
								
							?>
				<div class="box-body " id="box-body">	
					<div class="row">
						<div class="col-xs-12">
							
							
							
							
							<div class="row">
								
								<div class="col-xs-2">
									<?php // echo $form->errorSummary($customer); ?>
									<div class="form-group">
										
										<?php echo $form->labelEx($customer,'nic_no'); ?>
										<?php echo $form->textField($customer,'nic_no',array('maxlength'=>10,'class'=>'form-control')); ?>
										<?php echo $form->error($customer,'nic_no',array('id'=>'error-n')); ?>
										<div class="errorMessage" id="nic-error"></div>
									</div>
								</div>
								
								<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->labelEx($customer,'customer_name'); ?>
										<?php echo $form->textField($customer,'customer_name',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
										<?php echo $form->error($customer,'customer_name'); ?>
									</div>
								</div>
								
								<div class="col-xs-4">
									<div class="form-group">
										<?php echo $form->labelEx($customer,'address'); ?>
										<?php echo $form->textField($customer,'address',array('maxlength'=>80,'class'=>'form-control')); ?>
										<?php echo $form->error($customer,'address'); ?>
									</div>
								</div>
								
								<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->labelEx($customer,'phone'); ?>
										<?php echo $form->textField($customer,'phone',array('maxlength'=>10,'class'=>'form-control')); ?>
										<?php echo $form->error($customer,'phone'); ?>
										
									</div>
								</div>
								
								
							</div>
							
							<div class="row ">
							<div class="col-xs-4">
							<?php
				
							foreach($DateTime as $dt)
							{
								
							echo'	<dl>
							
							<dd>Check in Date & Time</dd>
							<dt>'.$dt['check_in_date_time'].'</dt>
							<dd>Check out Date & Time</dd>
							<dt>'.$dt['check_out_date_time'].'</dt>
							
							</dl>';
								
								echo"<input type='hidden' name='Reservation[0][check_in_date_time]' value='".$dt['check_in_date_time']."'>";
								echo"<input type='hidden' name='Reservation[0][check_out_date_time]' value='".$dt['check_out_date_time']."'>";
								}?>
							
							
							</div>
								<div class="col-xs-8">
									
									<div class="table-responsive">
										<table class="table table-hover" id="compareul">
											
											<tr>
												<th>Room Number</th> 
												<th>Type</th>
												<th>Adults</th> 	
												<th>Children</th> 
												
												<th>Tools</th>
											</tr>
											
											<?php
												
												
												$an=0;
												foreach($ROOM as $RM){
													
													$room=MainData::Room_Detail($RM['room_no']);
													$opt_ad=''; $opt_ch='';
													foreach($room as $rm)
													{
														if($rm['content']=='Single'){
															
															for($i=0;$i<3;$i++){
																
																if($i==$RM['adults']){
																	$opt_ad=$opt_ad."<option value='".$i."' Selected>".$i."</option>";
																}
																else{
																	$opt_ad=$opt_ad."<option value='".$i."' >".$i."</option>";
																}
																
																if($i>1){continue 1;}
																if($i==$RM['children']){
																	$opt_ch=$opt_ch."<option value='".$i."' Selected>".$i."</option>";
																}
																else{
																	$opt_ch=$opt_ch."<option value='".$i."' >".$i."</option>";
																}
															}
															
															
														}
														else{
															
															for($i=0;$i<3;$i++){
																
																if($i==$RM['adults']){
																	$opt_ad=$opt_ad."<option value='".$i."' Selected>".$i."</option>";
																}
																else{
																	$opt_ad=$opt_ad."<option value='".$i."' >".$i."</option>";
																}
																
																if($i==$RM['children']){
																	$opt_ch=$opt_ch."<option value='".$i."' Selected>".$i."</option>";
																}
																else{
																	$opt_ch=$opt_ch."<option value='".$i."' >".$i."</option>";
																}
																
															}
															
															
														}
														echo "<tr><td>".$RM['room_no']."<input type='hidden' name='ReservationDetail[".$an."][room_no]' value='".$RM['room_no']."'></td>
														<td><span class='label label-info'>".$rm['facility']."-".$rm['content']."</span></td>
														<td><Select name='ReservationDetail[".$an."][adults]' id='ReservationDetail[".$an."][adults]'  class='peo'>".$opt_ad."</select></td>
														
														<td><Select name='ReservationDetail[".$an."][children]' id='ReservationDetail[".$an."][children]' value='' >".$opt_ch."</select></td>
														
														<td></td>
														</tr>";
														
													}
													
													//	echo'<script>document.getElementById("ReservationDetail['.$an.'][adults]").selectedIndex='.$RM['adults'].';</script>';
													$an++;
												}
												
												
											?>
											
											
											
										</table>
										<p class="errorMessage pull-right" id="people-error"></p>
									</div>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="box-footer clearfix"  id="box-footer">
				<div class="buttons">
					
					
					<?php echo CHtml::submitButton($customer->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right','id'=>'submit_res')); ?>
					
					
					
				</div>
				<?php $this->endWidget(); ?>
			</div>
			</div>
			
			
			
		</div>
	</div>
	
</section>	

<script>
	
	
	cus_data = new Array();
	
	var row=<?php echo $an; ?>;
	
	var myElem = document.getElementById('error-n');
	if (myElem === null){
		
		var ne='nic-error';
	}
	else	
	{
		var ne='error-n';
	}
	
	
	
	$('.buttons').on("click",'#submit_res',function(e) {
		
		error=0;
		for(i=0;i<row;i++){
			var ad=document.getElementById("ReservationDetail["+i+"][adults]").value;	
			var ch=document.getElementById("ReservationDetail["+i+"][children]").value;
			
			if(ad<1 && ch<1)
			{
				
				error++;
				
			} 
			
			
			
		}
		if(error>0)
		{
			
			document.getElementById("people-error").innerHTML="Reservation Error";
			return false;
			
		}
		
	});
	
	$(document).ready(function () {
		//called when key is pressed in textbox
		$("#Customer_nic_no").keypress(function (e) {
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//	$("#"+ne).html("Integer Only").show().fadeOut("slow");
				return false;
			}
		});
		
		$("#Customer_phone").keypress(function (e) {
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//$("#"+ne).html("Integer Only").show().fadeOut("slow");
				return false;
			}
		});
		
		
		/* $(".peo").focusout(function(){
			$(this).css("background-color", "#FFFFCC");
		}); */
	});
	
	$("#Customer_nic_no").focusout(function(){
		
		
		
		var nic =document.getElementById("Customer_nic_no").value;
		
		
		if (isNaN(nic))
		{	
			
			document.getElementById(ne).innerHTML='NIC number has be an integer';
			//return false;
		}
		
		else if(nic.length<10)
		{
			document.getElementById(ne).innerHTML='NIC number should have 10 Ca';
			//return false;
			
		}
		else{
			document.getElementById(ne).innerHTML='';
		}
		
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/reservation/customer') ?>',
			type:"POST",
			data: {nic:nic},
			success:function(cus){
				cus_data = cus;
				cus_update();
			},
			
			dataType:"json"
		});
		
		
	});
	
	function cus_update(){
		
		document.getElementById("Customer_customer_name").value=cus_data[0];
		document.getElementById("Customer_address").value=cus_data[1];
		document.getElementById("Customer_phone").value=cus_data[2];
		
	}
	
</script>	