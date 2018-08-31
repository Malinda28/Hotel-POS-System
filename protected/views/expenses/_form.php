<?php
	/* @var $this ExpensesController */
	/* @var $model Expenses */
	/* @var $form CActiveForm */
?>



<div class="col-xs-12">
    <div class="box box-success">
		
		
		<div class="box-header with-border">
			<h3 class="box-title"><?php //echo $action; ?>Add  Expense </h3>
			
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'expenses-form',
			
			'enableAjaxValidation'=>false,
		)); ?>
		<div class="box-body ">		
			
			<div class="row">
				
				<div class="col-xs-3">
					
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'date'); ?>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							
							<?php echo $form->textField($model,'date',array('size'=>30,'maxlength'=>30,'class'=>'form-control datepicker','id'=>'datepicker')); ?>
							
							<?php echo $form->error($model,'date'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-xs-3">
					<div class="form-group">
						<?php echo $form->labelEx($model,'amount'); ?>
						<div class="input-group date">
							<div class="input-group-addon">
								Rs.
							</div>
							
							<?php echo $form->textField($model,'amount',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
							<?php echo $form->error($model,'amount'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-xs-3">
					<div class="form-group">
						<?php echo $form->labelEx($model,'description'); ?>
						<?php echo $form->textField($model,'description',array('size'=>30,'maxlength'=>50,'class'=>'form-control')); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>
				</div>
				
				<div class="col-xs-3">
					<div class="form-group">
						<?php echo $form->labelEx($model,'category'); ?>
						<?php echo $form->dropDownList($model, 'category',
							array('AE'=> 'Administration Expenses', 
							'SDE'=> 'Sales and Distribution Expenses',
							'FEO'=> 'Financial Expenses and Others' ),	  
						array('empty'=>' Select Category ','class'=>'form-control')); ?>	
						<?php echo $form->error($model,'category'); ?>
					</div>
				</div>
				
				
			</div>
		</div>
		
		<div class="box-footer clearfix">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
		</div>
		<?php $this->endWidget(); ?>
	</div>
	
	
</div>

<script>	
	$(function() {
		$('.datepicker').keypress(function(event) {
			event.preventDefault();
			return false;
		});
		
	});
	

</script>