<?php
/* @var $this ResItemDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Res Item Details',
);

$this->menu=array(
	array('label'=>'Create ResItemDetail', 'url'=>array('create')),
	array('label'=>'Manage ResItemDetail', 'url'=>array('admin')),
);
?>

<h1>Res Item Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
