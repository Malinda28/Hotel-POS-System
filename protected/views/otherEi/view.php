<?php
/* @var $this OtherEiController */
/* @var $model OtherEi */

$this->breadcrumbs=array(
	'Other Eis'=>array('index'),
	$model->monthyear,
);

$this->menu=array(
	array('label'=>'List OtherEi', 'url'=>array('index')),
	array('label'=>'Create OtherEi', 'url'=>array('create')),
	array('label'=>'Update OtherEi', 'url'=>array('update', 'id'=>$model->monthyear)),
	array('label'=>'Delete OtherEi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->monthyear),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OtherEi', 'url'=>array('admin')),
);
?>

<h1>View OtherEi #<?php echo $model->monthyear; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'monthyear',
		'sales',
		'costofsales',
		'otherincome',
		'admin_exp',
		'sales_disexp',
		'financial_exp',
	),
)); ?>
