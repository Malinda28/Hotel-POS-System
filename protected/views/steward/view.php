<?php
/* @var $this StewardController */
/* @var $model Steward */

$this->breadcrumbs=array(
	'Stewards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Steward', 'url'=>array('index')),
	array('label'=>'Create Steward', 'url'=>array('create')),
	array('label'=>'Update Steward', 'url'=>array('update', 'id'=>$model->steward_id)),
	array('label'=>'Delete Steward', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->steward_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Steward', 'url'=>array('admin')),
);
?>

<h1>View Steward #<?php echo $model->steward_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'steward_id',
		'name',
		'gender',
		'availability',	
	),
)); ?>
