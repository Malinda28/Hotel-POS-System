<?php
/* @var $this BuyingLeadsController */
/* @var $model BuyingLeads */

$this->breadcrumbs=array(
	'Buying Leads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BuyingLeads', 'url'=>array('index')),
	array('label'=>'Manage BuyingLeads', 'url'=>array('admin')),
);
?>

<h1>Create BuyingLeads</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>