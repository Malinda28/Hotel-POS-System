<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */

$this->breadcrumbs=array(
	'Kitchen Ingrediants'=>array('index'),
	$model->ingrediant_id=>array('view','id'=>$model->ingrediant_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KitchenIngrediants', 'url'=>array('index')),
	array('label'=>'Create KitchenIngrediants', 'url'=>array('create')),
	array('label'=>'View KitchenIngrediants', 'url'=>array('view', 'id'=>$model->ingrediant_id)),
	array('label'=>'Manage KitchenIngrediants', 'url'=>array('admin')),
);
?>

<h1>Update KitchenIngrediants <?php echo $model->ingrediant_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>