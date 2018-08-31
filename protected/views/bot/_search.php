<?php
/* @var $this BotController */
/* @var $model Bot */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bot_id'); ?>
		<?php echo $form->textField($model,'bot_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table_no'); ?>
		<?php echo $form->textField($model,'table_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_no'); ?>
		<?php echo $form->textField($model,'room_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'steward_id'); ?>
		<?php echo $form->textField($model,'steward_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_time'); ?>
		<?php echo $form->textField($model,'date_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->