<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($searchmodel,'item_id'); ?>
		<?php echo $form->textField($searchmodel,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'item_name'); ?>
		<?php echo $form->textField($searchmodel,'item_name',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'item_price'); ?>
		<?php echo $form->textField($searchmodel,'item_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->