<?php
/* @var $this ReservationController */
/* @var $data Reservation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reservation_id), array('view', 'id'=>$data->reservation_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CusID')); ?>:</b>
	<?php echo CHtml::encode($data->CusID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MobNo')); ?>:</b>
	<?php echo CHtml::encode($data->MobNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CusFName')); ?>:</b>
	<?php echo CHtml::encode($data->CusFName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CusLName')); ?>:</b>
	<?php echo CHtml::encode($data->CusLName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CusAddress')); ?>:</b>
	<?php echo CHtml::encode($data->CusAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_in')); ?>:</b>
	<?php echo CHtml::encode($data->check_in); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('check_out')); ?>:</b>
	<?php echo CHtml::encode($data->check_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_rooms')); ?>:</b>
	<?php echo CHtml::encode($data->no_rooms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_adults')); ?>:</b>
	<?php echo CHtml::encode($data->no_adults); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_children')); ?>:</b>
	<?php echo CHtml::encode($data->no_children); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	*/ ?>

</div>