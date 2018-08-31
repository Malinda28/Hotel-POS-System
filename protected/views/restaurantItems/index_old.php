<?php
/* @var $this RestaurantItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restaurant Items',
);

$this->menu=array(
	array('label'=>'Create Restaurant_items', 'url'=>array('create')),
	array('label'=>'Manage Restaurant_items', 'url'=>array('admin')),
);
?>

<h1>Restaurant Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
