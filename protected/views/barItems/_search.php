<?php
/* @var $this BarItemsController */
/* @var $searchmodel BarItems */
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
		<?php echo $form->label($searchmodel,'beverage_name'); ?>
		<?php echo $form->textField($searchmodel,'beverage_name',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'qty'); ?>
		<?php echo $form->textField($searchmodel,'qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'category'); ?>
		<?php echo $form->textField($searchmodel,'category',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml25'); ?>
		<?php echo $form->textField($searchmodel,'ml25'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml50'); ?>
		<?php echo $form->textField($searchmodel,'ml50'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml100'); ?>
		<?php echo $form->textField($searchmodel,'ml100'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml300'); ?>
		<?php echo $form->textField($searchmodel,'ml300'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml750'); ?>
		<?php echo $form->textField($searchmodel,'ml750'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'ml1000'); ?>
		<?php echo $form->textField($searchmodel,'ml1000'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->