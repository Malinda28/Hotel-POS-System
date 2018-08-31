<?php
/* @var $this BotController */
/* @var $data Bot */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bot_id), array('view', 'id'=>$data->bot_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('table_no')); ?>:</b>
	<?php echo CHtml::encode($data->table_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_no')); ?>:</b>
	<?php echo CHtml::encode($data->room_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('steward_id')); ?>:</b>
	<?php echo CHtml::encode($data->steward_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_time')); ?>:</b>
	<?php echo CHtml::encode($data->date_time); ?>
	<br />


</div>