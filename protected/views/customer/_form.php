<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<style>#Customer_unit{display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
border: 1px solid #ccc;}
</style>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Update Customer</h3>

            </div>
			
<div class="box-body ">			
		<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'nic_no'); ?>
					<div class="input-group">
								
								<?php echo $form->textField($model,'nic_no',array('class'=>'form-control')); ?>
								<span class="input-group-addon" id="basic-addon1">V</span>
								</div>
				
					<?php echo $form->error($model,'nic_no'); ?>
				</div>
	</div>
	
	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'customer_name'); ?>
					<?php echo $form->textField($model,'customer_name',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'customer_name'); ?>
				</div>
	</div>
	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'address'); ?>
					<?php echo $form->textField($model,'address',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'address'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'phone'); ?>
					<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'phone'); ?>
				</div>
	</div>
</div>
	</div>
	<div class="box-footer clearfix">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Update' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
