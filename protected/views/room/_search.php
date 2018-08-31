<?php
/* @var $this RoomController */
/* @var $searchmodel Room */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($searchmodel,'room_no'); ?>
		<?php echo $form->textField($searchmodel,'room_no'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($searchmodel,'availability'); ?>
		<?php echo $form->textField($searchmodel,'availability',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'type'); ?>
		<?php echo $form->textField($searchmodel,'type',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'Discription'); ?>
		<?php echo $form->textField($searchmodel,'Discription',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'max_adults'); ?>
		<?php echo $form->textField($searchmodel,'max_adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchmodel,'max_children'); ?>
		<?php echo $form->textField($searchmodel,'max_children'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->