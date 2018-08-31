<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */

$this->breadcrumbs=array(
	'Res Item Details'=>array('index'),
	$model->detail_id=>array('view','id'=>$model->detail_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ResItemDetail', 'url'=>array('index')),
	array('label'=>'Create ResItemDetail', 'url'=>array('create')),
	array('label'=>'View ResItemDetail', 'url'=>array('view', 'id'=>$model->detail_id)),
	array('label'=>'Manage ResItemDetail', 'url'=>array('admin')),
);
?>

<h1>Update ResItemDetail <?php echo $model->detail_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>