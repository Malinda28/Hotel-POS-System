<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */

$this->breadcrumbs=array(
	'Res Item Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ResItemDetail', 'url'=>array('index')),
	array('label'=>'Manage ResItemDetail', 'url'=>array('admin')),
);
?>

<h1>Create ResItemDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>