<?php
/* @var $this BarItemsController */
/* @var $model BarItems */

$this->breadcrumbs=array(
	'Bar Items'=>array('index'),
	$model->bar_item_id,
);

$this->menu=array(
	array('label'=>'List BarItems', 'url'=>array('index')),
	array('label'=>'Create BarItems', 'url'=>array('create')),
	array('label'=>'Update BarItems', 'url'=>array('update', 'id'=>$model->bar_item_id)),
	array('label'=>'Delete BarItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bar_item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BarItems', 'url'=>array('admin')),
);
?>

<h1>View BarItems #<?php echo $model->bar_item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bar_item_id',
		'beverage_name',
		'qty',
		'category',
		'ml25',
		'ml50',
		'ml100',
		'ml300',
		'ml750',
		'ml1000',
	),
)); ?>
