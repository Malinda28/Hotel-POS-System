<?php
/* @var $this Expenses_testingController */
/* @var $model Expenses_testing */

$this->breadcrumbs=array(
	'Expenses Testings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Expenses_testing', 'url'=>array('index')),
	array('label'=>'Manage Expenses_testing', 'url'=>array('admin')),
);
?>

<h1>Create Expenses_testing</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>