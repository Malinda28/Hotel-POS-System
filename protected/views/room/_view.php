<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->room_no), array('view', 'id'=>$data->room_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('availability')); ?>:</b>
	<?php echo CHtml::encode($data->availability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Discription')); ?>:</b>
	<?php echo CHtml::encode($data->Discription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_adults')); ?>:</b>
	<?php echo CHtml::encode($data->max_adults); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_children')); ?>:</b>
	<?php echo CHtml::encode($data->max_children); ?>
	<br />


</div>