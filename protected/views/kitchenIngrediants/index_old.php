<?php
/* @var $this KitchenIngrediantsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kitchen Ingrediants',
);

$this->menu=array(
	array('label'=>'Create KitchenIngrediants', 'url'=>array('create')),
	array('label'=>'Manage KitchenIngrediants', 'url'=>array('admin')),
);
?>

<h1>Kitchen Ingrediants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
