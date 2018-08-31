<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'detail_id'); ?>
		<?php echo $form->textField($model,'detail_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'res_item_id'); ?>
		<?php echo $form->textField($model,'res_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingrediant_id'); ?>
		<?php echo $form->textField($model,'ingrediant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingrediant_qty'); ?>
		<?php echo $form->textField($model,'ingrediant_qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->