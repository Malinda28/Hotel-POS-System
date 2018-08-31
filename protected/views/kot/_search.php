<?php
/* @var $this KotController */
/* @var $model Kot */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'kot_id'); ?>
		<?php echo $form->textField($model,'kot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rest_item_id'); ?>
		<?php echo $form->textField($model,'rest_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rest_item_size'); ?>
		<?php echo $form->textField($model,'rest_item_size',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qty'); ?>
		<?php echo $form->textField($model,'qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->