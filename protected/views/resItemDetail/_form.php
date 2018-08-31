<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'res-item-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'res_item_id'); ?>
		<?php echo $form->textField($model,'res_item_id'); ?>
		<?php echo $form->error($model,'res_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingrediant_id'); ?>
		<?php echo $form->textField($model,'ingrediant_id'); ?>
		<?php echo $form->error($model,'ingrediant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingrediant_qty'); ?>
		<?php echo $form->textField($model,'ingrediant_qty'); ?>
		<?php echo $form->error($model,'ingrediant_qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->