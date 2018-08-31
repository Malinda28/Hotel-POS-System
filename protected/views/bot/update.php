<?php
/* @var $this BotController */
/* @var $model Bot */

$this->breadcrumbs=array(
	'Bots'=>array('index'),
	$model->bot_id=>array('view','id'=>$model->bot_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bot', 'url'=>array('index')),
	array('label'=>'Create Bot', 'url'=>array('create')),
	array('label'=>'View Bot', 'url'=>array('view', 'id'=>$model->bot_id)),
	array('label'=>'Manage Bot', 'url'=>array('admin')),
);
?>

<h1>Update Bot <?php echo $model->bot_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>