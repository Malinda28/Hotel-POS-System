<?php
/* @var $this KotController */
/* @var $data Kot */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kot_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kot_id), array('view', 'id'=>$data->kot_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rest_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->rest_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rest_item_size')); ?>:</b>
	<?php echo CHtml::encode($data->rest_item_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty')); ?>:</b>
	<?php echo CHtml::encode($data->qty); ?>
	<br />


</div>