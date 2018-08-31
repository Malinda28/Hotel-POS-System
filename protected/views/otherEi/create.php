<?php
/* @var $this OtherEiController */
/* @var $model OtherEi */

$this->breadcrumbs=array(
	'Other Eis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherEi', 'url'=>array('index')),
	array('label'=>'Manage OtherEi', 'url'=>array('admin')),
);
?>

<h1>Create OtherEi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>