<?php
/* @var $this OtherEiController */
/* @var $model OtherEi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'monthyear'); ?>
		<?php echo $form->textField($model,'monthyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales'); ?>
		<?php echo $form->textField($model,'sales',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costofsales'); ?>
		<?php echo $form->textField($model,'costofsales',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherincome'); ?>
		<?php echo $form->textField($model,'otherincome',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_exp'); ?>
		<?php echo $form->textField($model,'admin_exp',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_disexp'); ?>
		<?php echo $form->textField($model,'sales_disexp',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'financial_exp'); ?>
		<?php echo $form->textField($model,'financial_exp',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->