<?php
/* @var $this KotController */
/* @var $model Kot */

$this->breadcrumbs=array(
	'Kots'=>array('index'),
	$model->kot_id=>array('view','id'=>$model->kot_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kot', 'url'=>array('index')),
	array('label'=>'Create Kot', 'url'=>array('create')),
	array('label'=>'View Kot', 'url'=>array('view', 'id'=>$model->kot_id)),
	array('label'=>'Manage Kot', 'url'=>array('admin')),
);
?>

<h1>Update Kot <?php echo $model->kot_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>