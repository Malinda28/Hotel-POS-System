<?php
/* @var $this StewardController */
/* @var $model Steward */

$this->breadcrumbs=array(
	'Stewards'=>array('index'),
	$model->Name=>array('view','id'=>$model->UserID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Steward', 'url'=>array('index')),
	array('label'=>'Create Steward', 'url'=>array('create')),
	array('label'=>'View Steward', 'url'=>array('view', 'id'=>$model->UserID)),
	array('label'=>'Manage Steward', 'url'=>array('admin')),
);
?>

<h1>Update Steward <?php echo $model->UserID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>