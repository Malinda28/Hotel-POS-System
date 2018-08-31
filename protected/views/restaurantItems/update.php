<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */

$this->breadcrumbs=array(
	'Restaurant Items'=>array('index'),
	$model->res_item_id=>array('view','id'=>$model->res_item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Restaurant_items', 'url'=>array('index')),
	array('label'=>'Create Restaurant_items', 'url'=>array('create')),
	array('label'=>'View Restaurant_items', 'url'=>array('view', 'id'=>$model->res_item_id)),
	array('label'=>'Manage Restaurant_items', 'url'=>array('admin')),
);
?>

<h1>Update Restaurant_items <?php echo $model->res_item_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>