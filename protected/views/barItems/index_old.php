<?php
/* @var $this BarItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bar Items',
);

$this->menu=array(
	array('label'=>'Create BarItems', 'url'=>array('create')),
	array('label'=>'Manage BarItems', 'url'=>array('admin')),
);
?>

<h1>Bar Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
