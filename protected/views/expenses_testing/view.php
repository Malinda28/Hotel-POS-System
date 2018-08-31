<?php
/* @var $this Expenses_testingController */
/* @var $model Expenses_testing */

$this->breadcrumbs=array(
	'Expenses Testings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Expenses_testing', 'url'=>array('index')),
	array('label'=>'Create Expenses_testing', 'url'=>array('create')),
	array('label'=>'Update Expenses_testing', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Expenses_testing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Expenses_testing', 'url'=>array('admin')),
);
?>

<h1>View Expenses_testing #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'description',
		'category',
		'date',
		'amount',
		'recipient',
		'approved',
	),
)); ?>
