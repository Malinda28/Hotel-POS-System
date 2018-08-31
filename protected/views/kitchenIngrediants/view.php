<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */

$this->breadcrumbs=array(
	'Kitchen Ingrediants'=>array('index'),
	$model->ingrediant_id,
);

$this->menu=array(
	array('label'=>'List KitchenIngrediants', 'url'=>array('index')),
	array('label'=>'Create KitchenIngrediants', 'url'=>array('create')),
	array('label'=>'Update KitchenIngrediants', 'url'=>array('update', 'id'=>$model->ingrediant_id)),
	array('label'=>'Delete KitchenIngrediants', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ingrediant_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KitchenIngrediants', 'url'=>array('admin')),
);
?>

<h1>View KitchenIngrediants #<?php echo $model->ingrediant_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ingrediant_id',
		'ingrediant_name',
		'ingrediant_qty',
		'unit',
	),
)); ?>
