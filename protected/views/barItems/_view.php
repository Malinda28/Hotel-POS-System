<?php
/* @var $this BarItemsController */
/* @var $data BarItems */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->item_id), array('view', 'id'=>$data->item_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beverage_name')); ?>:</b>
	<?php echo CHtml::encode($data->beverage_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty')); ?>:</b>
	<?php echo CHtml::encode($data->qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml25')); ?>:</b>
	<?php echo CHtml::encode($data->ml25); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml50')); ?>:</b>
	<?php echo CHtml::encode($data->ml50); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml100')); ?>:</b>
	<?php echo CHtml::encode($data->ml100); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ml300')); ?>:</b>
	<?php echo CHtml::encode($data->ml300); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml750')); ?>:</b>
	<?php echo CHtml::encode($data->ml750); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml1000')); ?>:</b>
	<?php echo CHtml::encode($data->ml1000); ?>
	<br />

	*/ ?>

</div>