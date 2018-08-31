<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */

$this->breadcrumbs=array(
	'Res Item Details'=>array('index'),
	$model->detail_id,
);

$this->menu=array(
	array('label'=>'List ResItemDetail', 'url'=>array('index')),
	array('label'=>'Create ResItemDetail', 'url'=>array('create')),
	array('label'=>'Update ResItemDetail', 'url'=>array('update', 'id'=>$model->detail_id)),
	array('label'=>'Delete ResItemDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->detail_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ResItemDetail', 'url'=>array('admin')),
);
?>

<h1>View ResItemDetail #<?php echo $model->detail_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'detail_id',
		'res_item_id',
		'ingrediant_id',
		'ingrediant_qty',
	),
)); ?>
