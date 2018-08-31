<?php
/* @var $this Expenses_testingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expenses Testings',
);

$this->menu=array(
	array('label'=>'Create Expenses_testing', 'url'=>array('create')),
	array('label'=>'Manage Expenses_testing', 'url'=>array('admin')),
);
?>

<h1>Expenses Testings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
