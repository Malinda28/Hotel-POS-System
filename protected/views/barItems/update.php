<?php
/* @var $this BarItemsController */
/* @var $model BarItems */

$this->breadcrumbs=array(
	'Bar Items'=>array('index'),
	$model->item_id=>array('view','id'=>$model->item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BarItems', 'url'=>array('index')),
	array('label'=>'Create BarItems', 'url'=>array('create')),
	array('label'=>'View BarItems', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'Manage BarItems', 'url'=>array('admin')),
);
?>

<h1>Update BarItems <?php echo $model->item_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>