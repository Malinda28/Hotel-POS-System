<?php
/* @var $this Expenses_testingController */
/* @var $model Expenses_testing */

$this->breadcrumbs=array(
	'Expenses Testings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Expenses_testing', 'url'=>array('index')),
	array('label'=>'Create Expenses_testing', 'url'=>array('create')),
	array('label'=>'View Expenses_testing', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Expenses_testing', 'url'=>array('admin')),
);
?>

<h1>Update Expenses_testing <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>