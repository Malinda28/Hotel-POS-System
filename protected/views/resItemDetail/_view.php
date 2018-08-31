<?php
/* @var $this ResItemDetailController */
/* @var $data ResItemDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->detail_id), array('view', 'id'=>$data->detail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('res_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->res_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediant_id')); ?>:</b>
	<?php echo CHtml::encode($data->ingrediant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediant_qty')); ?>:</b>
	<?php echo CHtml::encode($data->ingrediant_qty); ?>
	<br />


</div>