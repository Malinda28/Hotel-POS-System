<?php
/* @var $this KotController */
/* @var $model Kot */
/* @var $form CActiveForm */
?>

<div class="form">



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kot_id'); ?>
		<?php echo $form->textField($model,'kot_id'); ?>
		<?php echo $form->error($model,'kot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rest_item_id'); ?>
		<?php echo $form->textField($model,'rest_item_id'); ?>
		<?php echo $form->error($model,'rest_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rest_item_size'); ?>
		<?php echo $form->textField($model,'rest_item_size',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'rest_item_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty'); ?>
		<?php echo $form->textField($model,'qty'); ?>
		<?php echo $form->error($model,'qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

	</div>



</div><!-- form -->