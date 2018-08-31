<?php
/* @var $this OtherEiController */
/* @var $model OtherEi */
/* @var $form CActiveForm */
?>

<style>#OtherEi_unit{display: block;
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
         <h3 class="box-title"><?php echo $action;?> Other Expenses</h3>

            </div>
			
<div class="box-body ">			
		<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'other-ei-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'yearmonth'); ?>
					<?php echo $form->textField($model,'yearmonth',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'yearmonth'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'sales'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'sales',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'sales'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'costofsales'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'costofsales',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'costofsales'); ?>
				</div>
	</div>			

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'otherincome'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'otherincome',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'otherincome'); ?>
				</div>
	</div>
	
	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'admin_exp'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'admin_exp',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'admin_exp'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'sales_disexp'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'sales_disexp',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'sales_disexp'); ?>
				</div>
	</div>			

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'financial_exp'); ?>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rs.</span>
					<?php echo $form->textField($model,'financial_exp',array('class'=>'form-control')); ?>
					</div>
					<?php echo $form->error($model,'financial_exp'); ?>
				</div>
	</div>			
	</div>
</div>
	<div class="box-footer clearfix">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>