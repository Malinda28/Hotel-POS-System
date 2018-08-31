<?php
/* @var $this OtherEiController */
/* @var $model OtherEi */

$this->breadcrumbs=array(
	'Other Eis'=>array('index'),
	$model->monthyear=>array('view','id'=>$model->monthyear),
	'Update',
);

$this->menu=array(
	array('label'=>'List OtherEi', 'url'=>array('index')),
	array('label'=>'Create OtherEi', 'url'=>array('create')),
	array('label'=>'View OtherEi', 'url'=>array('view', 'id'=>$model->monthyear)),
	array('label'=>'Manage OtherEi', 'url'=>array('admin')),
);
?>

<h1>Update OtherEi <?php echo $model->monthyear; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>