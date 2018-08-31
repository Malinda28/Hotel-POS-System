<script>
	$("#M_repo").addClass("active");

</script>
<?php
	/* @var $this DefaultController */
	
	$this->breadcrumbs=array(
	$this->module->id,
	);
	$StartD=date("M-Y", strtotime($Start_date));
	$EndD=date("M-Y", strtotime($End_date));
	if(isset($Mchek)):
				
							
				$Start_date=date("F, Y", strtotime($Start_date));
				$End_date=date("F, Y", strtotime($End_date));		
				
				$MD='Month';
				
				else:
					
				$Start_date=date("F d, Y", strtotime($Start_date));
				$End_date=date("F d, Y", strtotime($End_date));
				$MD='Date';
				endif;
				
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
	<h1>Reports</h1>
</section>

<section class="content">
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Sales</h3>
					
				</div>
				<div class="box-body " >	
					<div class="row">
						<div class="col-xs-12">
							
							<!-- Date and time range -->
							<div class="row "><?php $form=$this->beginWidget('CActiveForm', array(
								
								'action' => Yii::app()->createUrl('Reports/Sales/SalesM'),
								
								
							)); ?>
								<div class="col-xs-8 month-select"> 
									<div class="col-xs-5">
										<div class="form-group">
											<?php //echo $form->labelEx($model,'date'); ?>
											<div class="input-group date">
												<div class="input-group-addon">
													From
												</div>
												<?php echo CHtml::textField('start_month',$StartD,array('size'=>30,'maxlength'=>30,'class'=>'form-control  monthpicker','id'=>'start_month')); ?>
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											</div></div>
									</div>
									<div class="col-xs-5">
										<div class="form-group">
											<?php //echo $form->labelEx($model,'date'); ?>
											<div class="input-group date">
												<div class="input-group-addon">
													To
												</div>
												<?php echo CHtml::textField('end_month',$EndD,array('size'=>30,'maxlength'=>30,'class'=>'form-control  monthpicker','id'=>'end_month')); ?>
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											</div></div>
									</div>
									<div class="col-xs-2">
										<div class="form-group pull-left">
											
											<button type="submit" style="float:left" id="savebut" onclick="return validate()" class="btn btn-default   pull-right">Submit</button>
										</div>
										
										
									</div>
									<p class="errorMessage pull-left" id="month-error"></p>
								</div><?php $this->endWidget();?>
								
								<?php $form=$this->beginWidget('CActiveForm', array(
								
								'action' => Yii::app()->createUrl('Reports/Sales'),
								
								
							)); ?>
								<div class="col-xs-4">
									<div class="form-group pull-right">
										<button type="submit" style="float:right" id="0"  class="btn btn-default  pull-right">Submit</button>
									</div>
									
									<div class="form-group pull-right">
										
										
										<div class="input-group">
											<button type="button" class="btn btn-default pull-right" id="daterange-btn">
												<span>
													<i class="fa fa-calendar"></i> Date range picker
												</span>
												<i class="fa fa-caret-down"></i>
											</button>
											
											
										</div>
										
									</div>
								</div>
								
							</div>
							
							
							
							<!-- /.form group -->
							<?php echo  CHtml::hiddenField('Start_Date', '' ,array('id'=>'Start_Date',));
								echo  CHtml::hiddenField('End_Date', '' ,array('id'=>'End_Date',));
							$this->endWidget(); ?>
						</div>
						
					</div>
					
					
					
					
					
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	<?php if(count($SALES)>0) {?>
		<div class="row">
			<?php 
				
				
				$this->renderPartial('_chartBar', array('SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,'MD'=>$MD)); 
				?>
				
				</div>
				
				<div class="row">
				<?php $this->renderPartial('_summary', array('SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,)); ?>
				</div> 
				<?php } 
				else{?>
				<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                No Data
				</div>
				
			<?php 	}?>
		
</section>	
<script>
	
	$(function (){Drangepicker(); Mpicker();} );
	
	window.onload = function() {
		
		var ctx = document.getElementById("Sales-Chart").getContext("2d");
		window.myLine = new Chart(ctx, configB);
		
		<?php if(count($SALES)>1){ ?>
				
				var ctx = document.getElementById("Sales-Chart-Line").getContext("2d");
		window.myLine = new Chart(ctx, configL);
			<?php	}?>
			
			
	};
	
	
</script>
<script>	
	function validate()
	{
		
		var StM=document.getElementById("start_month").value;
		var EnM=document.getElementById("end_month").value;
		
		var SM = new Date(StM); 
		var EM = new Date(EnM); 
		
		var sd=(SM.getMonth() + 1) +  "-" + SM.getFullYear(); 
		var ed=(EM.getMonth() + 1) +  "-" + EM.getFullYear();  
		
		
		if(StM==''){
			
			document.getElementById('month-error').innerHTML='Please select a Month';
			return false;
		}
		
		if(sd>ed)
		{
			document.getElementById('month-error').innerHTML='Month Error';
			return false;
			
		} 
		
		
	}
</script>
