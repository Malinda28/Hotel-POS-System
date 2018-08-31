<?php
/* @var $this ReservationController */
/* @var $searchmodel Reservation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($searchmodel,'CusID'); ?>
		<?php echo $form->textField($searchmodel,'CusID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'MobNo'); ?>
		<?php echo $form->textField($searchmodel,'MobNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'CusFName'); ?>
		<?php echo $form->textField($searchmodel,'CusFName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'CusLName'); ?>
		<?php echo $form->textField($searchmodel,'CusLName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'CusAddress'); ?>
		<?php echo $form->textField($searchmodel,'CusAddress',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'reservation_id'); ?>
		<?php echo $form->textField($searchmodel,'reservation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'check_in'); ?>
		<?php echo $form->textField($searchmodel,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'check_out'); ?>
		<?php echo $form->textField($searchmodel,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'no_rooms'); ?>
		<?php echo $form->textField($searchmodel,'no_rooms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'no_adults'); ?>
		<?php echo $form->textField($searchmodel,'no_adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'no_children'); ?>
		<?php echo $form->textField($searchmodel,'no_children'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'room_id'); ?>
		<?php echo $form->textField($searchmodel,'room_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->