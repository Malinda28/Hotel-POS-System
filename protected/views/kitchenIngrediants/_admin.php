<?php
/* @var $this KitchenIngrediantsController */
/* @var $searchmodel KitchenIngrediants */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ingrediant_id'); ?>
		<?php echo $form->textField($model,'ingrediant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingrediant_name'); ?>
		<?php echo $form->textField($model,'ingrediant_name',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingrediant_qty'); ?>
		<?php echo $form->textField($model,'ingrediant_qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->