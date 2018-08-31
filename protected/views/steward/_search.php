<?php
/* @var $this StewardController */
/* @var $searchmodel Steward */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($searchmodel,'UserID'); ?>
		<?php echo $form->textField($searchmodel,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Name'); ?>
		<?php echo $form->textField($searchmodel,'Name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Title'); ?>
		<?php echo $form->textField($searchmodel,'Title',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Gender'); ?>
		<?php echo $form->textField($searchmodel,'Gender',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Address'); ?>
		<?php echo $form->textField($searchmodel,'Address',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'City'); ?>
		<?php echo $form->textField($searchmodel,'City',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Province'); ?>
		<?php echo $form->textField($searchmodel,'Province',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'PostalCode'); ?>
		<?php echo $form->textField($searchmodel,'PostalCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'JoinedDate'); ?>
		<?php echo $form->textField($searchmodel,'JoinedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'HomePhn'); ?>
		<?php echo $form->textField($searchmodel,'HomePhn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'MobPhn'); ?>
		<?php echo $form->textField($searchmodel,'MobPhn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Email'); ?>
		<?php echo $form->textField($searchmodel,'Email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Notes'); ?>
		<?php echo $form->textField($searchmodel,'Notes',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->