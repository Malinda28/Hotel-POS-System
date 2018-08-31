<?php
/* @var $this KitchenIngrediantsController */
/* @var $data KitchenIngrediants */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediant_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ingrediant_id), array('view', 'id'=>$data->ingrediant_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediant_name')); ?>:</b>
	<?php echo CHtml::encode($data->ingrediant_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediant_qty')); ?>:</b>
	<?php echo CHtml::encode($data->ingrediant_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />


</div>