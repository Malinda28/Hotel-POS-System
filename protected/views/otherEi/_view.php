<?php
/* @var $this OtherEiController */
/* @var $data OtherEi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('monthyear')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->monthyear), array('view', 'id'=>$data->monthyear)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales')); ?>:</b>
	<?php echo CHtml::encode($data->sales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costofsales')); ?>:</b>
	<?php echo CHtml::encode($data->costofsales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otherincome')); ?>:</b>
	<?php echo CHtml::encode($data->otherincome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_exp')); ?>:</b>
	<?php echo CHtml::encode($data->admin_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_disexp')); ?>:</b>
	<?php echo CHtml::encode($data->sales_disexp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('financial_exp')); ?>:</b>
	<?php echo CHtml::encode($data->financial_exp); ?>
	<br />


</div>